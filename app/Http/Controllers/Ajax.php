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
        
        foreach ($games as $game) {
            $game['score'] = DB::table('score')->where('game_id',$game['id'])->get();
            $game['hteam'] = DB::table('team')->where('id',$game['home_team_id'])->get();
            $game['vteam'] = DB::table('team')->where('id',$game['away_team_id'])->get();
        }
        
        $response = json_encode($games);
        return $response;
    }
}
?>
