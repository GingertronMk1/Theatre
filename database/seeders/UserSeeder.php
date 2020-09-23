<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = new User([
            'name' => 'Superadmin',
            'email' => 'admin@tits.test',
            'password' => Hash::make('admin_password'),
            'group_id' => Group::where('name', 'Superadmin')->value('id'),
        ]);
        $superadmin->save();

        User::factory()->times(10)->create();

    }
}
