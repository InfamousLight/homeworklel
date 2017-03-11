<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++)
        {
            $name = str_random(10);
            DB::table('Band')->insert([
                'name' => str_random(10),
                'website' => 'http://www.' . $name . '.com',
                'start_date' => Carbon::now('America/Chicago')->subMonth(rand(1, 150))->toDateString(),
                'still_active' => rand(0, 1)
            ]);
        }
    }
}
