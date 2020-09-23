<?php

namespace Database\Seeders;

use App\Models\RoleSection;
use Illuminate\Database\Seeder;

class RoleSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ([
            'Cast' => 'The actors in the show',
            'Crew' => 'The people that make the show actually happen'
        ] as $role_name => $role_desc) {
            $rs = new RoleSection([
                'name' => $role_name,
                'description' => $role_desc
            ]);
            $rs->save();
        }
    }
}
