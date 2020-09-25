<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    public function trainingUsers() {
        return $this->hasMany('App\Models\TrainingUser', 'training_id');
    }

    public function getEligibleUsersAttribute()
    {
        if($this->prerequisites()->count() > 0) {
            $prereq_ids = $this->prerequisites()->select('prerequisite_id')->get();
            return User::whereHas('trainingReceived', function(Builder $query) use ($prereq_ids) {
                return $query->whereIn('id', $prereq_ids);
            })->get();
        } else {
            return User::all();
        }
    }
}
