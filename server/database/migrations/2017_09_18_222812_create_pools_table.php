<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pools', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); //administrator of the betting pool.
            $table->string('name'); //name of the pool

            //================betting pool settings

            //weekly payouts # = 0-100 which represents % of collected credits
            $table->unsignedInteger('week_first')->default('0'); //first place
            $table->unsignedInteger('week_second')->default('0'); //second place
            $table->unsignedInteger('week_third')->default('0'); //third place
            $table->unsignedInteger('extra')->default('0'); //extra held over for the end of season

            //end of season payouts
            $table->unsignedInteger('season_first')->default('0');
            $table->unsignedInteger('season_second')->default('0');
            $table->unsignedInteger('season_third')->default('0');


            $table->string('type'); //there are two different game types - read documentation for details on the differences
            $table->integer('entry'); //number of credits to play for the week
            $table->boolean('private')->default(false); //if the game is private, can only be found through its code.
            $table->string('code')->nullable(); //code for identifying this specific game
            //==========betting pool settings

            $table->timestamps();
        });

        //A user can play in multiple pools, and pools can have multiple players.
        Schema::create('pool_user', function(Blueprint $table) {
           $table->integer('pool_id')->unsigned()->index();
           $table->integer('user_id')->unsigned()->index();

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
        Schema::dropIfExists('pools');
        Schema::dropIfExists('pool_user');
    }
}
