<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingUser;
use App\Models\User;
use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    //
    public function newSession()
    {
        $users = User::all();
        $trainings = Training::all();
        return view(
            'training-session.new',
            compact('users', 'trainings')
        );
    }

    public function saveSession(Request $request)
    {
        foreach($request->input('trainings') as $training) {
            foreach($request->input('trainees') as $trainee) {
                $trainingUser = TrainingUser::firstOrNew([
                    'training_id' => $training,
                    'trainee_id' => $trainee
                ]);

                $trainingUser->trainer_id = $request->input('trainer');
                if(!$trainingUser->save()) {
                    return "PROBLEM";
                };
            }
        }
        return redirect()->route('training.index');
    }
}
