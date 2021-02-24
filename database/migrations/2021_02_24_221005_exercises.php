<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Exercises extends Migration
{
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('muscle_group');
            $table->integer('sets');
            $table->integer('reps');
            $table->string('equipment');
        });
    }

    public function down()
    {
        Schema::dropIfExists('exercises');
    }
}
