<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const TYPE_SYSTEM = 'system';
    public const TYPE_USER = 'user';

    protected $fillable = [
        'role_section_id',
        'name',
        'description'
    ];

    protected $attributes = [
        'type' => self::TYPE_USER,
    ];

    public function roleSection() {
        return $this->belongsTo(RoleSection::class);
    }
}
