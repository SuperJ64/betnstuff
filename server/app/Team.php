<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //Team database is static, so it will not change, no columns are fillable only readable.

    public function home() {
        return $this->belongsToMany('App\Team', 'games', 'home', 'away', 'abbr', 'abbr')
            ->withPivot( 'week','start', 'home_q1', 'home_q2', 'home_q3', 'home_q4', 'away_q1', 'away_q2', 'away_q3', 'away_q4');
    }

    public function away() {
        return $this->belongsToMany('App\Team', 'games', 'away', 'home', 'abbr', 'abbr')
            ->withPivot( 'week','start', 'home_q1', 'home_q2', 'home_q3', 'home_q4', 'away_q1', 'away_q2', 'away_q3', 'away_q4');
    }
}
