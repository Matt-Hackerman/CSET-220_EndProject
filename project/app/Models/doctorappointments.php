<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctorappointments extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'appointmentID',
        'patientID',
        'doctorID',
        'appointmentDate',
    ];
}

