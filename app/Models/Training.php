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

    public function prerequisites() {
        return $this->hasMany('App\Models\Prerequisite', 'training_id');
    }

    public function trainingUsers() {
        return $this->hasMany('App\Models\TrainingUser', 'training_id');
    }
}
