<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();
class RosterAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d');
        $_SESSION['roster'] = DB::select('select roster.date, roster.superID, roster.doctorID,
        roster.caregiver_1_ID, roster.caregiver_2_ID, roster.caregiver_3_ID, roster.caregiver_4_ID,
        concat(supervisor.f_Name, " ", supervisor.l_Name) as superName,
        concat(doctor.f_Name, " ", doctor.l_Name) as doctorName
        from roster
        join supervisor on roster.superID=supervisor.superID
        join doctor on roster.doctorID=doctor.doctorID
        where roster.date = "'. $date .'"');
        
        $_SESSION['careRoster1'] = DB::select('select caregiverID, concat(caregiver.f_Name, " ", caregiver.l_Name) as name from caregiver
        where caregiverID = (select caregiver_1_ID from roster where date = "'. $date .'")');
        $_SESSION['careRoster2'] = DB::select('select caregiverID, concat(caregiver.f_Name, " ", caregiver.l_Name) as name from caregiver
        where caregiverID = (select caregiver_2_ID from roster where date = "'. $date .'")');
        $_SESSION['careRoster3'] = DB::select('select caregiverID, concat(caregiver.f_Name, " ", caregiver.l_Name) as name from caregiver
        where caregiverID = (select caregiver_3_ID from roster where date = "'. $date .'")');
        $_SESSION['careRoster4'] = DB::select('select caregiverID, concat(caregiver.f_Name, " ", caregiver.l_Name) as name from caregiver
        where caregiverID = (select caregiver_4_ID from roster where date = "'. $date .'")');

        return view('roster');
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
