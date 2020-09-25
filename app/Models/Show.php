<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function instances() {
        return $this->hasMany(ShowInstance::class);
    }

    public function showRoles() {
        return $this->hasMany(ShowRole::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class, ShowRole::class)->withPivot(['user_id']);
    }

    public function cast() {
        $sectionId = RoleSection::where('name', '=', RoleSection::NAME_CAST)->first()->id;
        return $this
        ->showRoles()
        ->with(['user', 'role'])
        ->whereHas('role', function(Builder $query) use ($sectionId) {
            $query->where('role_section_id', $sectionId);
        });
    }
    public function crew() {
        $sectionId = RoleSection::where('name', '=', RoleSection::NAME_CREW)->first()->id;
        return $this
        ->showRoles()
        ->with(['user', 'role'])
        ->whereHas('role', function(Builder $query) use ($sectionId) {
            $query->where('role_section_id', $sectionId);
        });
    }
}
