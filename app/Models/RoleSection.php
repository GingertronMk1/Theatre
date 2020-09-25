<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleSection extends Model
{
    use HasFactory;

    public const NAME_CAST = 'Cast';
    public const NAME_CREW = 'Crew';

    protected $fillable = [
        'name',
        'description'
    ];

    public function roles() {
        return $this->hasMany(Role::class);
    }
}
