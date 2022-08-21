<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/*Atribute*/
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function name():Attribute
    {
        return new Attribute(

            //Accesor
            //Recuperar el valor de la BD en un VALUE
            get: function($value){

                //Las primeras letras en mayusculas
                return ucwords($value);

                //Otra opcion usando funcion flecha de php puro
                // get: fn($value) => ucwords($value),
                //Cuando utilizamos funcion flecha no es necesario ; al final
            },

            //Mutador
            /*Capturar el campo de texto NAME en una variable VALUE*/ 
            set: function($value){

                //Retornar el valor en la forma en la que quiero que se almacene en mi BD
                return strtolower($value);
                //Otra opcion usando funcion flecha de php puro
                // set: fn($value) => strtolower($value)
            }
        );
    }

    /*Accesor en versiones anteriores
    public function getNameAttribute($value){
        return ucwords($value);
    }
    */

    /*Mutador en versiones anteriores
    public function setNameAttribute($value){
        //Acceder al atributo, especificabamos que atributo deseamos cambiar (name) y por ultimo le pasabamos el valor transformado
        //$this->attribute['name'] = strtolower($value);
    }
    */

}
