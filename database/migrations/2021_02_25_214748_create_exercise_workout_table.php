<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseWorkoutTable extends Migration
{
    public function up()
    {
        Schema::create('exercise_workout', function (Blueprint $table) {
            $table->foreignId('exercise_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('workout_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exercise_workout');
    }
}
