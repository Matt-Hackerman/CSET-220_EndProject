<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supervisor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'supervisor';
    protected $fillable = [
        'roleID',
        'salaryID',
        'superID',
        'f_name',
        'l_name',
        'email',
        'phone',
        'password',
        'DOB',
    ];
}