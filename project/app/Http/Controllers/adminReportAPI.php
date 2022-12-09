<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class adminReportAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_SESSION['adminPatient'] = DB::select('select concat(patient.f_Name, " ", patient.l_Name) as patName,
        concat(doctor.f_Name, " ", doctor.l_Name) as docName,
        doctorAppoint, concat(caregiver.f_Name, " ", caregiver.l_Name) as careName,
        doctorAppoint, morningMeds, afternoonMeds, nightMeds, breakfast, lunch, dinner
        from patientchecklist join patient
        on patientchecklist.patientID=patient.patientID
        join doctor on patientchecklist.doctorID=doctor.doctorID
        join caregiver on patientchecklist.caregiverID=caregiver.caregiverID
        where patientchecklist.date = "'. date('Y-m-d') .'"');
        return view('/adminReport');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
