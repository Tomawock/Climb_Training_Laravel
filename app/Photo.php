<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Photo extends Model
{
    protected $table="photo";
    public $timestamps = false;
    //
    
    public static $rules =[
        'exercisePhotoDescription'=>'required|regex:/[a-zA-Z0-9\s]+/'        
    ];
    
    public function exercise(){
        return $this->belongsTo('App\Exercisie','id_exercise');
    }
}
