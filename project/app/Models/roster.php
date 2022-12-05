<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roster extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'roster';
    protected $fillable = [
        'date',
        'superID',
        'doctorID',
        'caregiver_1_ID',
        'caregiver_2_ID',
        'caregiver_3_ID',
        'caregiver_4_ID',
    ];
}
