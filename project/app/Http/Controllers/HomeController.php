<?php

namespace App\Http\Controllers;

session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function dates() {
        $dates = DB::select("
            SELECT date FROM patientchecklist WHERE patientID = \"" . $_SESSION["userID"] . "\""
        );

        $_SESSION["dates"] = $dates;

        $checkList = DB::select("
            SELECT CONCAT(doctor.f_Name, \" \", doctor.l_Name) as doctor, patientchecklist.doctorAppoint, 
            CONCAT(caregiver.f_Name, \" \", caregiver.l_Name) as caregiver, patientchecklist.morningMeds, 
            patientchecklist.afternoonMeds, patientchecklist.nightMeds, patientchecklist.breakfast, 
            patientchecklist.lunch, patientchecklist.dinner 
            FROM patientchecklist 
            JOIN patient ON patient.patientID = patientchecklist.patientID 
            JOIN doctor ON patientchecklist.doctorID = doctor.doctorID 
            JOIN caregiver ON patientchecklist.caregiverID = caregiver.caregiverID 
            WHERE patientchecklist.patientID = \"" . $_SESSION["userID"] . "\"" . " 
            AND patientchecklist.date = \"" . date("Y-m-d") . "\""
        );

        $_SESSION["list"] = $checkList;
        
        return $checkList;
    }

    public function patientCheckList(Request $request) {
        $fields = $request->validate([
            'date' => 'required|string'
        ]);
    }
}
