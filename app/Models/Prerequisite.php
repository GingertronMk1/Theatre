<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prerequisite extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'training_id',
        'prerequisite_id'
    ];

    protected $with = [
        'training',
        'prerequisite'
    ];

    public function training() {
        return $this->belongsTo('App\Models\Training', 'training_id');
    }

    public function prerequisite() {
        return $this->belongsTo('App\Models\Training', 'prerequisite_id');
    }

}
