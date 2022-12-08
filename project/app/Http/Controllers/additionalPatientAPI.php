<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class additionalPatientAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_SESSION['addPatients'] = DB::select('select patientID, concat(f_Name, " ", l_Name) as name from patient where admissionStatus = "Approved" and admissionDate is NULL and groups is NULL;');
        return view('/additionalPatient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('patient')
            ->where('patientID', $request->input('patientID'))
            ->update(['groups' => $request->input('groups')]);
        DB::table('patient')
            ->where('patientID', $request->input('patientID'))
            ->update(['admissionDate' => $request->input('admissionDate')]);
        return view("welcome");
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
