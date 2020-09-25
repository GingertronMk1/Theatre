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
            RoleSection::NAME_CAST => 'The actors in the show',
            RoleSection::NAME_CREW => 'The people that make the show actually happen'
        ] as $role_name => $role_desc) {
            $rs = new RoleSection([
                'name' => $role_name,
                'description' => $role_desc,
                'type' => RoleSection::TYPE_SYSTEM
            ]);
            $rs->save();
        }
    }
}
