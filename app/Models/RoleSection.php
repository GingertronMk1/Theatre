<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleSection extends Model
{
    use HasFactory;

    public const TYPE_SYSTEM = 'system';
    public const TYPE_USER = 'user';

    public const NAME_CAST = 'Cast';
    public const NAME_CREW = 'Crew';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $attributes = [
        'type' => self::TYPE_USER,
    ];

    public function roles() {
        return $this->hasMany(Role::class);
    }
}
