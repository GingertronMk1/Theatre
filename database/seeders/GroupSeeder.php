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
        DB::table('groups')->insert([
            'name' => 'Superadmin',
            'type' => Group::TYPE_SYSTEM
        ]);
        DB::table('groups')->insert([
            'name' => 'Admin',
            'type' => Group::TYPE_SYSTEM
        ]);
        DB::table('groups')->insert([
            'name' => 'Normal',
            'type' => Group::TYPE_SYSTEM
        ]);
    }
}
