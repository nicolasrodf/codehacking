<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //mass asignmente de_Todo lo que se ingresa en el formulario correspondiente a la creaciond e usuario!
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'photo_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //buscar rol
    public function role(){

        return $this->belongsTo('App\Role');

    }

}
