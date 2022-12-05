<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'doctor';
    protected $fillable = [
        'roleID',
        'salaryID',
        'doctorID',
        'f_name',
        'l_name',
        'email',
        'phone',
        'password',
        'DOB',
    ];
}