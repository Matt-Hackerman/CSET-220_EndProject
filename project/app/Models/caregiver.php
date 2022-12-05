<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caregiver extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'caregiver';
    protected $fillable = [
        'roleID',
        'salaryID',
        'caregiverID',
        'f_name',
        'l_name',
        'email',
        'phone',
        'password',
        'DOB',
    ];
}