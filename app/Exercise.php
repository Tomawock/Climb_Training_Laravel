<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    
    protected $table="exercise";
    public $timestamps = false;
    //
    //regex:/^[a-zA-Z0-9\s]+$/ va bene per lettere con spazi e non caratteris peciali
    //regex:/[a-zA-Z0-9\s]+/ come sopra ma con caratteris peciali
    
    public static function rules($request) {
        $rules = [
            'exerciseName' => 'required|regex:/[a-zA-Z0-9\s]+/',
            'exerciseDescription' => 'required|regex:/[a-zA-Z0-9\s]+/',
            'exerciseImportantNotes' => 'required|regex:/[a-zA-Z0-9\s]+/',
        ];
 
        $rules['exerciseRepsMax'] = 'required|numeric|min:'.$request->input('exerciseRepsMin');
        $rules['exerciseSetMax'] = 'required|numeric|min:'.$request->input('exerciseSetMin');
        $rules['exerciseRestMax'] = 'required|date_format:H:i:s|after_or_equal:'.$request->input('exerciseRestMin');
        $rules['exerciseOverweightMax'] = 'required|numeric|min:'.$request->input('exerciseOverweightMin');
        
        return $rules;
    }

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    
    public function photos(){
         return $this->hasMany('App\Photo', 'id_exercise');
    }
    
    public function tools(){
         return $this->belongsToMany('App\Tool', 'exercise_to_tools','id_exercise','id_tool');
    }
    
    public function trainingprograms(){
         return $this->belongsToMany('App\TrainingProgram', 'trainingprogram_to_exercise','id_exercise','id_trainingProgram');
    }
    
    public function myToolsToString(){  
        $toolsString='';
        foreach ($this->tools as $tool){
            $toolsString.= '#'. $tool->name . ' ';
        }
        return $toolsString;
    }
}
