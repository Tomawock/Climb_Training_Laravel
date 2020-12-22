<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class History extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table="history";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'json', 'id_user', 'date',
    ];
    
    
    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
}
