<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class Scores extends Controller
{
    /*
    |-----------------------------------------------------------------
    | Get Scores Controller
    |-----------------------------------------------------------------
    |
    | Fetch the scores for all games and store them in the database.
    |
    | @param  string  $url
    | @return string  $exit_code
    */
    public function getScores()
    {
        $url = 'http://www.nfl.com/liveupdate/scores/scores.json';
        $content = file_get_contents($url);
        $scores_json = json_decode($content, true);
        
        $url = 'http://www.nfl.com/liveupdate/scorestrip/ss.json';
        $content = file_get_contents($url);
        $ss_json = json_decode($content, true);

        foreach ($scores_json as $gid => $game) {
            //print $gid."&nbsp;";
            //print $game['home']['score']['T']."&nbsp;";
            //print $game['away']['score']['T']."<br/>";
            
            // Get team IDs
            $home_team = DB::table('team')->where('abbr', $game['home']['abbr'])->value('id');
            $away_team = DB::table('team')->where('abbr', $game['away']['abbr'])->value('id');
            
            // Save teams
            if (! $home_team > 0) {
            	print "Inserting home team into DB";
                //$home_team = DB::table('team')->insertGetId(['abbr' => $game['home']['abbr']]);
            }
            if (! $away_team > 0) {
            	print "Inserting away team into DB";
                //$away_team = DB::table('team')->insertGetId(['abbr' => $game['away']['abbr']]);
            }
            
            // Save game
            print "Inserting game for ". $home_team ." ". $away_team;
            /*DB::table('game')->insert(
                ['home_team_id' => $home_team],
                ['away_team_id' => $away_team],
                ['start' => $game['home']['abbr']]
            );*/
            
            // Save scores
        }

        $response = array('exit_code' => 'success');
        //return $response;
    }
}
?>
