<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players');
            $table->date('game_date');
            $table->string('opponent');
            $table->integer('at_bat');
            $table->integer('single');
            $table->integer('double');
            $table->integer('triple');
            $table->integer('homerun');
            $table->integer('strikeout');
            $table->integer('walk');
            $table->integer('hit_by_pitch');
            $table->integer('steal');
            $table->integer('sacrifice_bunt');
            $table->integer('sacrifice_fly');
            $table->integer('rbi');
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
        Schema::dropIfExists('performances');
    }
}
