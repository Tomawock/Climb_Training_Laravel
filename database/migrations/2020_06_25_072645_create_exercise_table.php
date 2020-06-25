<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExerciseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercise', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->text('importantNotes');
            $table->integer('repsMin');
            $table->integer('repsMax');
            $table->integer('setMin');
            $table->integer('setMax');
            $table->time('restMin');
            $table->time('restMax');
            $table->integer('overweightMin');
            $table->integer('overweightMax');
            $table->string('overweightUnit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercise');
    }
}
