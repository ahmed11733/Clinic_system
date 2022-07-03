<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Doctor extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table= 'doctors';


    protected $fillable = [
        
        
        'id',
         'speciality',
        'phone',
        'photo',

        'name',
        'email',
        'password',
         'gender',

        'governorate',


        'mobile_number',
        'photo',

        'chinicPhoto1',
        'chinicPhoto2',
        'chinicPhoto3',

        'chinicBill1',
        'chinicBill2',


        'latitude',
        'longitude',

        'examinationPrice',
        'waitTime',
        

        'about', 
        'country',
        'year',
        'uni',
        'degree',


    ];
    public function user(){

        return $this->hasMany(User::class);
    }


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        
    ];



    //Required methods for jwt
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }
}
