<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserSquarePositions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('square_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('userId');
            $table->integer('positionX');
            $table->integer('positionY');
            $table->tinyInteger('squareNumber');
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
