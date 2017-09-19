<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home');
            $table->string('away');
            $table->integer('week')->unsigned();
            $table->dateTime('start');
            $table->unsignedInteger('home_q1')->default('0');
            $table->unsignedInteger('home_q2')->default('0');
            $table->unsignedInteger('home_q3')->default('0');
            $table->unsignedInteger('home_q4')->default('0');
            $table->unsignedInteger('home_q5')->default('0');
            $table->unsignedInteger('away_q1')->default('0');
            $table->unsignedInteger('away_q2')->default('0');
            $table->unsignedInteger('away_q3')->default('0');
            $table->unsignedInteger('away_q4')->default('0');
            $table->unsignedInteger('away_q5')->default('0');
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
        Schema::dropIfExists('games');
    }
}
