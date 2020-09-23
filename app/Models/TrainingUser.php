<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TrainingUser extends Pivot
{

    protected $with = [
        'trainer', 'trainee', 'training'
    ];

    public function trainer() {
        return $this->belongsTo(User::class, 'trainer_id');
    }
    public function trainee() {
        return $this->belongsTo(User::class, 'trainee_id');
    }
    public function training() {
        return $this->belongsTo(Training::class, 'training_id');
    }
}
