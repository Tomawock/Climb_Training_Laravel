<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;

class Photo extends Model
{
    protected $table="photo";
    public $timestamps = false;
    //
    
    public function exercise(){
        return $this->belongsTo('App\Exercisie','id_exercise');
    }
}
