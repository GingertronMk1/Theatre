<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_section_id',
        'name',
        'description'
    ];

    public function roleSection() {
        return $this->belongsTo(RoleSection::class);
    }
}
