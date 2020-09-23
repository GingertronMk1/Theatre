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

    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
