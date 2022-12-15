<?php

namespace App\Http\Controllers;

use App\Models\supervisor;
use App\Models\admin;
use App\Models\caregiver;
use App\Models\doctor;
use App\Models\patient;
use App\Models\patientfm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class registercontrollerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $submit = $request->validate([
            'sel' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'unique:admin|unique:supervisor|unique:caregiver|unique:doctor|unique:patientfm|unique:patient|required',
            'phone' => 'required',
            'password' => 'required',
            'DOB' => 'required',
        ]);
        if($submit['sel']=="Supervisor"){
            $roleID = 5;
            $superID = "SV" . random_int(100000, 999999);
            $salaryID = 3;
            supervisor::create(['roleID' => $roleID, 'salaryID' => $salaryID, 'superID' => $superID, 'f_name' => $submit['f_name'], 'l_name' => $submit['l_name'], 'email' => $submit['email'], 'phone' => $submit['phone'], 'password' => $submit['password'], 'DOB' => $submit['DOB']]);
            return view("/login");
        }
        else if($submit['sel']=="Admin"){
            $roleID = 6;
            $superID = "AD" . random_int(100000, 999999);
            $salaryID = 4;
            admin::create(['roleID' => $roleID, 'salaryID' => $salaryID, 'adminID' => $superID, 'f_name' => $submit['f_name'], 'l_name' => $submit['l_name'], 'email' => $submit['email'], 'phone' => $submit['phone'], 'password' => $submit['password'], 'DOB' => $submit['DOB']]);    
            return view("/login");
        }
        else if($submit['sel']=="Caregiver"){
            $roleID = 3;
            $superID = "CG" . random_int(100000, 999999);
            $salaryID = 4;
            caregiver::create(['roleID' => $roleID, 'salaryID' => $salaryID, 'caregiverID' => $superID, 'f_name' => $submit['f_name'], 'l_name' => $submit['l_name'], 'email' => $submit['email'], 'phone' => $submit['phone'], 'password' => $submit['password'], 'DOB' => $submit['DOB']]);  
            return view("/login");
        }
        else if($submit['sel']=="Doctor"){
            $roleID = 4;
            $superID = "DR" . random_int(100000, 999999);
            $salaryID = 2;
            doctor::create(['roleID' => $roleID, 'salaryID' => $salaryID, 'doctorID' => $superID, 'f_name' => $submit['f_name'], 'l_name' => $submit['l_name'], 'email' => $submit['email'], 'phone' => $submit['phone'], 'password' => $submit['password'], 'DOB' => $submit['DOB']]);  
            return view("/login");
        }
        else if($submit['sel']=="PatientFM"){
            $roleID = 1;
            $superID = "FM" . random_int(100000, 999999);
            patientfm::create(['roleID' => $roleID, 'patient_FM_ID' => $superID, 'f_name' => $submit['f_name'], 'l_name' => $submit['l_name'], 'email' => $submit['email'], 'phone' => $submit['phone'], 'password' => $submit['password'], 'DOB' => $submit['DOB']]);
            return view("/login");
        }
        else if($submit['sel']=="Patient"){
            $roleID = 2;
            $superID = "PT" . random_int(100000, 999999);
            $checklistID = "CL" . random_int(100000, 999999);
            $paymentID = "CL" . random_int(100000, 999999);
            patient::create(['roleID' => $roleID, 'patientID' => $superID, 'f_name' => $submit['f_name'], 'l_name' => $submit['l_name'], 'email' => $submit['email'], 'phone' => $submit['phone'], 'password' => $submit['password'], 'DOB' => $submit['DOB'], 'familyCode' => $request->input('familyCode'), 'emergencyContact' => $request->input('emergencyContact'), 'contactRelationship' => $request->input('contactRelationship')]);
            DB::insert('insert into patientchecklist values ("'.$checklistID.'", "'.$superID.'", "DR123456", "CG823342", "'.date('Y-m-d').'", 0, 0, 0, 0, 0, 0, 0)'); 
            DB::insert('insert into payment values ("'.$paymentID.'", "'.$superID.'", 30, "'.date("Y-m-d").'")');
            return view("/login");
        }
        
        return view('register');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
