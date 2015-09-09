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
            $json_games[$game->id]['score'] = DB::table('score')->where('game_id',$game->id)->get();
            $json_games[$game->id]['hteam'] = DB::table('team')->where('id',$game->home_team_id)->get();
            $json_games[$game->id]['vteam'] = DB::table('team')->where('id',$game->away_team_id)->get();
        }
        
        $response = json_encode($json_games);
        return $response;
    }
}
?>
