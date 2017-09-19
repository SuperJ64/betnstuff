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

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weeks');
    }
}
