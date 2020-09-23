<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleSection;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach([
            'Director' => [
                'role_section' => 'Crew',
                'description' => "Tells the actors what to do and the tech crew what they think they should do generally to be shooed off because they don't know what they're talking about",
            ],
            'Producer' => [
                'role_section' => 'Crew',
                'description' => "Makes sure things actually get done, organises rehearsals and runs and generally has less hair on closing night than they did before proposals",
            ],
            'Technical Director' => [
                'role_section' => 'Crew',
                'description' => "Keeps tech on track, calls cues on show nights",
            ],
            'Lighting Designer' => [
                'role_section' => 'Crew',
                'description' => "Makes sure you can see the show (except when you shouldn't)",
            ],
            'Sound Designer' => [
                'role_section' => 'Crew',
                'description' => "Makes the show sound all nice",
            ],
            'Actor' => [
                'role_section' => 'Cast',
                'description' => "Says the words in the script, hopefully in order",
            ],
        ] as $role_name => $role_data) {
            $role = new Role([
                'name' => $role_name,
                'description' => $role_data['description'],
                'role_section_id' => RoleSection::where('name', $role_data['role_section'])->first()->id
            ]);
            $role->save();
        }
    }
}
