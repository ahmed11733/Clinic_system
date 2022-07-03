<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicalHistory extends Model
{
    use HasFactory;
protected $table='medical_histories';
    
    
    protected $fillable = [
        'patient_id',
        'height',
        'weight',
        'bloodType',
        'relationshipState',
        'diseases',

   
    ];


}
