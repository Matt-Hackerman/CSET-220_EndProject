<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registercontroller extends Controller
{
    public function registration(Request $request){
$fields = $request->validate([
            'email' => 'required|string|unique:accounts,email'
        ]);
        DB::table('supervisor')->insert([
            'roleID' => $request->input('roleID'),
            'f_Name' => $request->input('f_name'),
            'l_Name' => $request->input('l_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
            'DOB' => $request->input('DOB')
        ]);

    }
}
