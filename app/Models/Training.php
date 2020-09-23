<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function prerequisites()
    {
        return $this->hasMany(
            Prerequisite::class,
            'training_id'
        );
    }

    public function prerequisiteOf()
    {
        return $this->hasMany(
            Prerequisite::class,
            'prerequisite_id'
        );
    }

    public function trainedUsers()
    {
        return $this->belongsToMany(
            User::class,
            null,
            null,
            'trainee_id'
        );
    }
}
