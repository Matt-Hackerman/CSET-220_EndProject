<?php

namespace App\Http\Controllers;

use App\Models\prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class patientDoctorAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patientDoctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preID = "PS" . random_int(100000, 999999);

        prescription::create(['prescriptionID' => $preID,
        'patientID' => $_SESSION['pid'],
        'date' => date('Y-m-d'),
        'comment' => $request->input('comment'),
        'morningMed' => $request->input('morningMed'),
        'afternoonMed' => $request->input('afternoonMed'),
        'nightMed' => $request->input('nightMed'),
        'doctorID' => $_SESSION['userID']]);

        return view('patientDoctor');
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
