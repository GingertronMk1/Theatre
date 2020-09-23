<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\User;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    //
    public function newSession() {
        $users = User::all();
        $trainings = Training::all();
        return view(
            'training-session.new',
            compact('users', 'trainings')
        );
    }
}
