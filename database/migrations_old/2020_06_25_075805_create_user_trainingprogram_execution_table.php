<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTrainingprogramExecutionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trainingprogram_execution', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_exercise')->unsigned();
            $table->integer('id_trainingProgram')->unsigned();
            $table->integer('id_user')->unsigned();
            
            $table->integer('reps');  
            $table->integer('sets');
            $table->date('date');
            $table->text('note');
            
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_trainingProgram')->references('id')->on('trainingprogram');
            $table->foreign('id_exercise')->references('id')->on('exercise');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_trainingprogram_execution');
    }
}
