<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->integer('s_id')->unsigned();
            $table->integer('c_id')->unsigned();
            $table->integer('score');
            $table->timestamps();

            $table->foreign('s_id')
                  ->references('s_id')->on('students')
                  ->onDelete('cascade');

            $table->foreign('c_id')
                  ->references('c_id')->on('courses')
                  ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('scores');
    }


}
