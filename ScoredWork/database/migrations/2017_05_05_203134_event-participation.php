<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventParticipation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event-participation', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('formal');
            $table->boolean('puntual');
            $table->integer('percentage');
            $table->integer('points');
            $table->boolean('confirmation')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event-participation');
    }
}
