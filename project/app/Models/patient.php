<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'patient';
    protected $fillable = [
        'roleID',
        'patientID',
        'f_name',
        'l_name',
        'email',
        'phone',
        'password',
        'DOB',
        'familyCode',
        'emergencyContact',
        'contactRelationship',
    ];
}