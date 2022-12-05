<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientfm extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'patientfm';
    protected $fillable = [
        'roleID',
        'patient_FM_ID',
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