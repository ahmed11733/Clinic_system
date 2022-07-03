<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDays extends Model
{
    use HasFactory;
protected $table='week_days';
    protected $fillable = [

        'doctor_id',
        'name',
        'start',
        'end',
   
    ];

}
