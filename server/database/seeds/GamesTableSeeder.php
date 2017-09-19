<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Game;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $season = date('Y');

        for ($week = 1; $week <= 17; $week++) {

            $url = 'http://www.nfl.com/ajax/scorestrip?season='.$season.'&seasonType=REG&week='.$week;

            $content = file_get_contents($url);
            $xml = simplexml_load_string($content);
            $json = json_encode($xml);
            $arrs = json_decode($json, true);

            foreach ($arrs['gms']['g'] as $arr) {

                $info = $arr['@attributes'];

                $game = new Game;
                $game->home = $info['h'];
                $game->away = $info['v'];

                $date = $info['eid'];
                $year = substr($date, 0, 4);
                $month = substr($date, 4, 2);
                $day = substr($date, 6, 2);

                $time = explode(":", $info['t']);
                $hour = $time[0];
                $minute = $time[1];
                $second = 0;

                $tz = 'America/New_York';

                $start = Carbon::create($year, $month, $day, $hour, $minute, $second, $tz);

                $game->start = $start;
                $game->year = $season;
                $game->week = $week;

                $game->save();
            }

        }


    }
}
