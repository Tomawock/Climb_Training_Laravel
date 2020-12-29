<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingprogramToExercise extends Model
{
    protected $table="trainingprogram_to_exercise";
    public $timestamps = false;
    //
    
    public function exercises(){
         return $this->belongsToMany('App\Exercise', 'exercise_to_tools','id_tool','id_exercise');
    }
}
