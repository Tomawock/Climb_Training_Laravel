<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseToToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise_to_tools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_exercise')->unsigned();
            $table->integer('id_tool')->unsigned();
            
            $table->foreign('id_exercise')->references('id')->on('exercise');
            $table->foreign('id_tool')->references('id')->on('tecnical_tools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise_to_tools');
    }
}
