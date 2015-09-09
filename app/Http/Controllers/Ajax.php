<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class Ajax extends Controller
{
    /*
    |-----------------------------------------------------------------
    | Ajax Controller
    |-----------------------------------------------------------------
    |
    | Fetch team, game, and score data from the database.
    |
    | @param  string  $action
    | @return string  $json
    */
    public function getGames()
    {
        // Get all the games
        $games = DB::table('game')->get();
        
        $json_games = array();
        foreach ($games as $game) {
        	// Get start time
        	$json_games[$game->id]['game']['start'] = $game->start;
            
        	// Get scores and team info for home team
        	$home_total = DB::table('score')
        	    ->select('home_q1')
        	    ->where('game_id',$game->id)
        	    ->value('home_q1');
        	if ( !$home_total >= 0){ $json_games[$game->id]['home']['score'] = 'NA'; }
        	
            $json_games[$game->id]['home']['team'] = DB::table('team')
                ->select('name','abbr')
                ->where('id',$game->home_team_id)
                ->get();
            
            // Get scores and team info for away team
            $away_total = DB::table('score')
                ->select('away_q1')
                ->where('game_id',$game->id)
                ->value('away_q1');
            if ( !$away_total >= 0){ $json_games[$game->id]['away']['score'] = 'NA'; }
            
            $json_games[$game->id]['away']['team'] = DB::table('team')
                ->select('name','abbr')
                ->where('id',$game->away_team_id)
                ->get();
        }
        
        return response()->json($json_games);
    }
}
?>
