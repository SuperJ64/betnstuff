<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'user_id', 'private', 'code'
    ];

    /**
     * List the user that is administering this betting pool.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin() {
        return $this->belongsTo('App\User');
    }

    /**
     * List the players playing in this Pool
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function players() {
        return $this->belongsToMany('App\Pool', 'pool_user');
    }
}
