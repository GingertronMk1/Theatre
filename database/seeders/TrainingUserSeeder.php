<?php

namespace Database\Seeders;

use App\Models\Training;
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
            DB::table('training_user')->insert([
                'training_id' => $training->id,
                'trainer_id' => 1,
                'trainee_id' => 1
            ]);
        }
    }
}
