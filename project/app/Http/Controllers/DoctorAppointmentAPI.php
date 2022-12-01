<?php

namespace App\Http\Controllers;

use App\Models\doctorappointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class DoctorAppointmentAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        
        $_SESSION['patients'] = DB::select('select patientID, concat(f_Name, " ", l_Name) from patient;');
        $_SESSION['doctors'] = DB::select('select doctorID, concat(f_Name, " ", l_Name) from doctor;');

        return view('doctorappointment');
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
            'patientID' => 'required',
            'doctorID' => 'required',
            'appointmentDate' => 'required',
        ]);

        $appointmentID = "AP" . random_int(100000, 999999);

        doctorappointments::create(['appointmentID' => $appointmentID, 'patientID' => $submit['patientID'], 'doctorID' => $submit['doctorID'], 'appointmentDate' => $submit['appointmentDate']]);
        return redirect('welcome');
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
