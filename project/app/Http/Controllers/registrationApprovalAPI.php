<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
session_start();
class registrationApprovalAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_SESSION['approval'] = DB::select('select patientID as ID, concat(f_Name, " ", l_Name) as name, role from patient join role on patient.roleID=role.roleID where admissionStatus = "Pending"
        union
        select doctorID as ID, concat(f_Name, " ", l_Name) as name, role from doctor join role on doctor.roleID=role.roleID where admissionStatus = "Pending"
        union
        select superID as ID, concat(f_Name, " ", l_Name) as name, role from supervisor join role on supervisor.roleID=role.roleID where admissionStatus = "Pending"
        union
        select caregiverID as ID, concat(f_Name, " ", l_Name) as name, role from caregiver join role on caregiver.roleID=role.roleID where admissionStatus = "Pending"
        union
        select patient_FM_ID as ID, concat(f_Name, " ", l_Name) as name, role from patientfm join role on patientfm.roleID=role.roleID where admissionStatus = "Pending"
        union
        select adminID as ID, concat(f_Name, " ", l_Name) as name, role from admin join role on admin.roleID=role.roleID where admissionStatus = "Pending"');
        return view("registrationApproval");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('ID');

        if(substr($id, 0, 2) == "AD"){
            $test = DB::table('admin')
            ->where('adminID', $id)
            ->update(['admissionStatus' => $request->input('approval')]);
            return view("registrationApproval");
        } else if(substr($id, 0, 2) == "CG"){
            $test = DB::table('caregiver')
            ->where('caregiverID', $id)
            ->update(['admissionStatus' => $request->input('approval')]);
            return view("registrationApproval");
        } else if(substr($id, 0, 2) == "SV"){
            $test = DB::table('supervisor')
            ->where('superID', $id)
            ->update(['admissionStatus' => $request->input('approval')]);
            return view("registrationApproval");
        } else if(substr($id, 0, 2) == "DR"){
            $test = DB::table('doctor')
            ->where('doctorID', $id)
            ->update(['admissionStatus' => $request->input('approval')]);
            return view("registrationApproval");
        }
        else if(substr($id, 0, 2) == "FM"){
            $test = DB::table('patientfm')
            ->where('patient_FM_ID', $id)
            ->update(['admissionStatus' => $request->input('approval')]);
            return view("registrationApproval");
        }
        else if(substr($id, 0, 2) == "PT"){
            $test = DB::table('patient')
            ->where('patientID', $id)
            ->update(['admissionStatus' => $request->input('approval')]);
            return view("registrationApproval");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
