<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        (new GroupSeeder())->run();
        (new UserSeeder())->run();
        (new TrainingSeeder())->run();
        (new TrainingUserSeeder())->run();
    }
}
