<?php

namespace App\Http\Controllers;

use App\Models\roster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Symfony\Component\Console\Input\Input;
session_start();
class newroster extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_SESSION['super'] = DB::select('select superID, concat(f_name, l_name) as name from supervisor ;');
        $_SESSION['doctor'] = DB::select('select doctorID, concat(f_name, l_name) as name from doctor ;');
        $_SESSION['caregiver'] = DB::select('select caregiverID, concat(f_name, l_name) as name from caregiver ;');

        return view('newroster');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        roster::create(['date' => $request->input('date'), 'superID' => $request->input('superID'), 'doctorID' => $request->input('doctorID'), 'caregiver_1_ID' => $request->input('caregiver_1_ID'), 'caregiver_2_ID' => $request->input('caregiver_2_ID'), 'caregiver_3_ID' => $request->input('caregiver_3_ID'), 'caregiver_4_ID' => $request->input('caregiver_4_ID')]);
        return view("home");
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
