<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = 'http://www.nfl.com/liveupdate/scorestrip/ss.json';
        $content = file_get_contents($url);
        $games = json_decode($content, true);

        $i = 0;
        foreach ($games['gms'] as $game) {

            Team::create([
                'abbr' => $game['h'],
                'name' => $game['hnn']
            ]);

            Team::create([
                'abbr' => $game['v'],
                'name' => $game['vnn']
            ]);
        }
    }
}
