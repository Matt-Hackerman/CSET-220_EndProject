<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescription extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'prescription';
    protected $fillable = [
        'prescriptionID',
        'patientID',
        'date',
        'comment',
        'morningMed',
        'afternoonMed',
        'nightMed',
        'doctorID',
    ];
}
