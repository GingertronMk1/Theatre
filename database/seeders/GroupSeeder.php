<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Superadmin','Admin','User'] as $name) {
            DB::table('groups')->insert([
                'name' => $name,
                'type' => Group::TYPE_SYSTEM
            ]);
        }
    }
}
