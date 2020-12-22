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
     
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    
    public function exercises(){
         return $this->belongsToMany('App\Exercise', 'trainingprogram_to_exercise','id_trainingProgram','id_exercise');
    }
}
