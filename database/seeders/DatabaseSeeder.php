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
        $seeders = [
            new GroupSeeder(),
            new UserSeeder(),
            new TrainingSeeder(),
            new TrainingUserSeeder(),
            new ShowSeeder(),
            new ShowInstanceSeeder(),
            new RoleSectionSeeder(),
            new RoleSeeder()
        ];
        foreach($seeders as $seeder) {
            $seeder->run();
        }
    }
}
