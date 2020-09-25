<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'show_id',
        'user_id',
        'role_id',
        'metadata'
    ];

    protected $casts = [
        'metadata' => 'json'
    ];

    public function show() {
        return $this->belongsTo(Show::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }
}
