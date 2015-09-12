<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eid')->unsigned();
            $table->integer('home_team_id')->unsigned();
            $table->foreign('home_team_id')->references('id')->on('team');
            $table->integer('away_team_id')->unsigned();
            $table->foreign('away_team_id')->references('id')->on('team');
            $table->dateTime('start');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('game');
    }
}
