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
    	$url = 'http://www.nfl.com/liveupdate/scorestrip/ss.json';
    	$content = file_get_contents($url);
    	$ss_json = json_decode($content, true);
    	
        $url = 'http://www.nfl.com/liveupdate/scores/scores.json';
        $content = file_get_contents($url);
        $scores_json = json_decode($content, true);

        foreach ($ss_json['gms'] as $game) {
            // Map game data to game
            $eid = $game["eid"];
            $game['data'] = $scores_json[$eid];
            
            // Get team IDs
            $home_team = DB::table('team')->where('abbr', $game['data']['home']['abbr'])->value('id');
            $away_team = DB::table('team')->where('abbr', $game['data']['away']['abbr'])->value('id');
            
            // Save teams
            if (! $home_team > 0) {
            	print "Inserting home team into DB<br/>";
                $home_team = DB::table('team')->insertGetId([
                    'name' => $game['hnn'],
                    'abbr' => $game['data']['home']['abbr']
                ]);
            } else {
                print "Updating home team in DB<br/>";
                DB::table('team')->where('id',$home_team)->update(['name' => $game['hnn']]);
            }
            if (! $away_team > 0) {
                print "Inserting away team into DB<br/>";
                $away_team = DB::table('team')->insertGetId([
                    'name' => $game['vnn'],
                    'abbr' => $game['data']['away']['abbr']
                ]);
            } else {
                print "Updating away team in DB<br/>";
                DB::table('team')->where('id',$away_team)->update(['name' => $game['vnn']]);
            }
            
            // Determine start time
            $year = substr($eid,0,4);
            $month = substr($eid,4,2);
            $day = substr($eid,6,2);
            $time = explode(':',$game['t']);
            $hours = $time[0] + 12;
            $minutes = $time[1];
            $seconds = 0;
            $start = date("Y-m-d H:i:s", mktime($hours, $minutes, $seconds, $month, $day, $year));
            
            // Pull game ID
            $gid = DB::table('game')
                ->where('home_team_id', $home_team)
                ->where('away_team_id', $away_team)
                ->value('id');
            
            // Save game
            if (! $gid > 0) {
                print "Inserting game for ". $home_team ." ". $away_team ." ". $start ."<br/>";
                $gid = DB::table('game')->insertGetId([
                    'home_team_id' => $home_team,
            	    'away_team_id' => $away_team,
                    'start' => $start
                ]);
            }
            
            // Save scores
            print "Inserting scores ". $game['data']['home']['score']['T']  ." ". $game['data']['away']['score']['T'] ."<br/>";
            if ($game['data']['home']['score']['T'] != Null && $game['data']['home']['score']['T'] != Null) {
                DB::table('scrore')->insert([
                    'game_id' => $gid,
                    'home_q1' => $game['data']['home']['score']['1'],
                    'home_q2' => $game['data']['home']['score']['2'],
                    'home_q3' => $game['data']['home']['score']['3'],
                    'home_q4' => $game['data']['home']['score']['4'],
                    'home_q5' => $game['data']['home']['score']['5'],
                    'away_q1' => $game['data']['away']['score']['1'],
                    'away_q2' => $game['data']['away']['score']['2'],
                    'away_q3' => $game['data']['away']['score']['3'],
                    'away_q4' => $game['data']['away']['score']['4'],
                    'away_q5' => $game['data']['away']['score']['5']
                ]);
            }
            print "<p>----------------------------------------</p>";
        }

        $response = array('exit_code' => 'success');
        //return $response;
    }
}
?>
