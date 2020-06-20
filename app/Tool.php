<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $table="tecnical_tools";
    public $timestamps = false;
    //
    
    public function exercises(){
         return $this->belongsToMany('App\Exercise', 'exercise_to_tools','id_tool','id_exercise');
    }
}
