<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patientchecklist extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkListID',
        'patientID',
        'doctorID',
        'caregiverID',
        'date',
        'doctorAppoint',
        'morningMeds',
        'afternoonMeds',
        'nightMeds',
        'breakfast',
        'lunch',
        'dinner',
    ];
}
