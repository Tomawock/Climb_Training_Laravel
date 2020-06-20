<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myuser extends Model
{
    protected $table="user";
    public $timestamps = false;
    
    public function trainingprograms(){
         return $this->belongsToMany('App\TrainingProgram', 'user_trainingprogram','user_id','trainingprogram_id');
    }
    
    public function executedtrainingprograms(){
         return $this->belongsToMany('App\TrainingProgram', 'user_trainingprogram_execution','id_user','id_trainingProgram')->withPivot('id_exercise','date', 'reps','sets','note')->orderBy('date','asc');
    }
    
    public function executedexercises(){
         return $this->belongsToMany('App\Exercise', 'user_trainingprogram_execution','id_user','id_exercise')->withPivot('id_trainingProgram','date', 'reps','sets','note')->orderBy('date','asc');
    }
}
