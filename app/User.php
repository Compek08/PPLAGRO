<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	public $timestamps = true;
    protected $fillable = [
        'password','id','name','nik','alamat','email','telp'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','role'
    ];

// public function chek(){
//     if(Auth::check()){
//         return true;
//     }else{
//         return false;
//     }
// }
}
