<?php

namespace Database\Seeders;

use App\Models\Training;
use App\Models\TrainingUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Training::all() as $training) {
            $training_user = new TrainingUser([
                'training_id' => $training->id,
                'trainer_id' => 1,
                'trainee_id' => 1
            ]);

            $training_user->save();
        }
    }
}
