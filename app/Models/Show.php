<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function instances() {
        return $this->hasMany(ShowInstance::class);
    }
}
