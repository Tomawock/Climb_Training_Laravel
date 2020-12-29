<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $table="trainingprogram";
    public $timestamps = false;
    

     
    public static function rules($request) {
        $rules = [
            'trainingProgramTitle' => 'required|regex:/[a-zA-Z0-9\s]+/',
            'trainingProgramDescription' => 'required|regex:/[a-zA-Z0-9\s]+/'
        ];

        $rules['trainingProgramTimeMax'] = 'required|date_format:H:i:s|after_or_equal:' . $request->input('trainingProgramTimeMin');

        return $rules;
    }

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
    
    public function exercises(){
         return $this->belongsToMany('App\Exercise', 'trainingprogram_to_exercise','id_trainingProgram','id_exercise');
    }
}
