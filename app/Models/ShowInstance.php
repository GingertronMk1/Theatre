<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowInstance extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'start_time'
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_time' => 'datetime',
    ];


    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
