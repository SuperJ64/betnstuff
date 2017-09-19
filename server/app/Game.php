<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'home', 'away', 'start',
        'home_q1', 'home_q2', 'home_q3', 'home_q4',
        'away_q1', 'away_q2', 'away_q3', 'away_q4'
    ];

}
