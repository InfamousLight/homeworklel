<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bands = DB::table('Band')->select('id')->get();

        foreach($bands as $band) {
            for($i = 0; $i < rand(1, 5); $i++) {
                $genres = array('Rock', 'Pop', 'KPop', 'Techno', 'Dubstep', 'Classical');
                $recordedDate = Carbon::now('America/Chicago')->subMonth(rand(1, 36))->toDateString();
                $releaseDate = new Carbon($recordedDate);
                $releaseDate->addMonth(rand(5, 12));

                DB::table('Album')->insert([
                    'band_id' => $band->id,
                    'name' => str_random(10),
                    'recorded_date' => $recordedDate,
                    'release_date' => $releaseDate,
                    'number_of_tracks' => rand(1,100),
                    'label' => str_random(5),
                    'producer' => str_random(5) . ' ' . str_random(5),
                    'genre' => $genres[rand(0,5)]
                ]);
            }
        }
    }
}
