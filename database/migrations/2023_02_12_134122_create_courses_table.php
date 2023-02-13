<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
 
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('c_id');
            $table->string('c_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
 
}
