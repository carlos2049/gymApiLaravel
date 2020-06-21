<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Paciente;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   
    public function paciente()
    {
        return $this->hasOne(Paciente::class);
    }
    protected $fillable = [
        'name',
        'a_paterno',
        'a_materno',
        'fecha_nacimiento',
        'rut',
        'telefono',
        'email',
        'password',
        'id_perfil',
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
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    public static function generarToken(){
        return str_random(40);
    }

}
