<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('game');
            $table->smallInteger('home_q1');
            $table->smallInteger('home_q2');
            $table->smallInteger('home_q3');
            $table->smallInteger('home_q4');
            $table->smallInteger('home_q5');
            $table->smallInteger('away_q1');
            $table->smallInteger('away_q2');
            $table->smallInteger('away_q3');
            $table->smallInteger('away_q4');
            $table->smallInteger('away_q5');
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
        Schema::drop('score');
    }
}
