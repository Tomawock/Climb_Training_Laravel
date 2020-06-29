<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
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
