<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registercontroller extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'roleID',
        'f_name',
        'l_name',
        'email',
        'phone',
        'password',
        'DOB'
    ];
}