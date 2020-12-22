<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $table="trainingprogram";
    public $timestamps = false;
    
     public static $rules =[
        'trainingProgramTitle'=>'required|regex:/[a-zA-Z0-9\s]+/',
        'trainingProgramDescription'=>'required|regex:/[a-zA-Z0-9\s]+/'
    ];
    
//    public function users(){
//    will be deprecated soon, see trainingprograms inside User
//         return $this->belongsToMany('App\User', 'user_trainingprogram','trainingprogram_id','user_id');
//    }
     
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    
    public function exercises(){
         return $this->belongsToMany('App\Exercise', 'trainingprogram_to_exercise','id_trainingProgram','id_exercise');
    }
    
    public function exercise(){
         return $this->hasMany('App\Exercise','id_exercise');
    }
    
    
    public function executedOnUser(){
         return $this->belongsToMany('App\User', 'user_trainingprogram_execution','id_trainingProgram','id_user');
    }
    
    public function executedOnExercise(){
         return $this->belongsToMany('App\Exercise', 'user_trainingprogram_execution','id_trainingProgram','id_exercise');
    }
}
