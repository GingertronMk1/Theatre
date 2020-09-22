<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(['Drill','Broom','Saw'] as $name) {
            DB::table('trainings')->insert(compact('name'));
        }
    }
}
