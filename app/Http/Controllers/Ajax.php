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
        	$json_games[$game->id]['game']['start'] = $game->start;
            $json_games[$game->id]['home']['score'] = DB::table('score')->select('home_q1')->where('game_id',$game->id)->value('home_q1');
            $json_games[$game->id]['home']['team'] = DB::table('team')->select('name','abbr')->where('id',$game->home_team_id)->value('abbr');
            $json_games[$game->id]['away']['score'] = DB::table('score')->select('away_q1')->where('game_id',$game->id)->value('away_q1');
            $json_games[$game->id]['away']['team'] = DB::table('team')->select('name','abbr')->where('id',$game->away_team_id)->value('abbr');
        }
        
        return response()->json($json_games);
    }
}
?>
