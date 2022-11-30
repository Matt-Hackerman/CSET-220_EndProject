<?php

namespace App\Http\Controllers;

session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function patientSearch(Request $request) {
        $fields = $request->validate([
            'date' => 'required|string'
        ]);

        $dates = DB::select("
            SELECT appointmentDate FROM doctorappointments WHERE patientID = " . $_SESSION["userID"]
        );
    }
}
