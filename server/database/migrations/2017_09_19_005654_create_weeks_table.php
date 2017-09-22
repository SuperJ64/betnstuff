<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /**
         * The weeks table holds the number of credits collected each week for a specific betting pool
         * Week 0 represents the end of season payouts.
         */
        Schema::create('weeks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pool_id')->unsigned(); //pool this week is for
            $table->unsignedInteger('week'); //week number
            $table->integer('credits')->unsigned()->default('0'); //credits collected for this week

            //user ids for user that placed first second and third
            $table->unsignedInteger('first')->default('0');
            $table->unsignedInteger('second')->default('0');
            $table->unsignedInteger('third')->default('0');

            $table->timestamps();
        });

        /**
         * week_user tracks how many credits a player payed for a given week
         * and how many points they got for that week
         */
        Schema::create('user_week', function (Blueprint $table) {
           $table->unsignedInteger('user_id');
           $table->unsignedInteger('week_id');
           $table->unsignedInteger('credits');
           $table->unsignedInteger('points');
        });

        /**
         * There are multiple games per week
         * and multiple weeks per pool
         * and multiple games per week
         * and a player makes one pick per game, per week, per pool
         */
        Schema::create('picks', function (Blueprint $table) {
           $table->unsignedInteger('user_id'); //the user that made this pick
            $table->unsignedInteger('game_id'); //the game this pick is for
            $table->unsignedInteger('week_id'); //the week this pick is for this ties the pick to the pool.
            $table->string('pick'); //the users pick to win.
            $table->unsignedInteger('points')->default(1); //the number of points this is worth if correct.
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_week');
        Schema::dropIfExists('picks');
        Schema::dropIfExists('weeks');
    }
}
