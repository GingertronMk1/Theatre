<?php

namespace Database\Seeders;

use App\Models\Show;
use App\Models\ShowInstance;
use DateTime;
use Illuminate\Database\Seeder;

class ShowInstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start_time = (new DateTime(
            date(
                'c',
                strtotime('next wednesday')
            )
        ))->modify('+19 hours + 30 minutes');

        foreach(Show::all() as $show) {
            $show_start_time = new DateTime($start_time->format('c'));
            for($d = 0; $d < 4; $d++) {
                $show_instance = new ShowInstance([
                    'show_id' => $show->id,
                    'start_time' => $show_start_time
                ]);
                $show_instance->save();
                $show_start_time->modify('+1 day');
            }
            $start_time->modify('+1 week');
        }
    }
}
