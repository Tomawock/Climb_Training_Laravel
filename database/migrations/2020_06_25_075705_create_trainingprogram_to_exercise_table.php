<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingprogramToExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainingprogram_to_exercise', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_exercise')->unsigned();
            $table->integer('id_trainingProgram')->unsigned();
            
            $table->foreign('id_exercise')->references('id')->on('exercise');
            $table->foreign('id_trainingProgram')->references('id')->on('trainingprogram');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainingprogram_to_exercise');
    }
}
