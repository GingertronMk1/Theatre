<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TrainingUser extends Pivot
{

    protected $with = [
        'trainer', 'trainee', 'training'
    ];

    public function trainer() {
        return $this->belongsTo('App\Models\User', 'trainer_id');
    }
    public function trainee() {
        return $this->belongsTo('App\Models\User', 'trainee_id');
    }
    public function training() {
        return $this->belongsTo('App\Models\Training', 'training_id');
    }
}
