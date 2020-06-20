<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $table="trainingprogram";
    public $timestamps = false;
    
    public function users(){
         return $this->belongsToMany('App\Myuser', 'user_trainingprogram','trainingprogram_id','user_id');
    }
    
    public function exercises(){
         return $this->belongsToMany('App\Exercise', 'trainingprogram_to_exercise','id_trainingProgram','id_exercise');
    }
    
    public function executedOnUser(){
         return $this->belongsToMany('App\Myuser', 'user_trainingprogram_execution','id_trainingProgram','id_user');
    }
    
    public function executedOnExercise(){
         return $this->belongsToMany('App\Exercise', 'user_trainingprogram_execution','id_trainingProgram','id_exercise');
    }
}
