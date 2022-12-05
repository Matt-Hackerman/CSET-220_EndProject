<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
session_start();
class PaymentAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_SESSION['payment'] = DB::select('select * from payment;');
        $_SESSION['doctorAppointments'] = DB::select('select * from doctorAppointments;');
        $_SESSION['prescription'] = DB::select('select * from prescription;');

        return view('payment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $paymentID = "PM" . random_int(100000, 999999);
        $totalDue = $request->input('totalDue');
        $newPayment = $request->input('newPayment');
        $payment = $totalDue - $newPayment;
        Payment::create(['paymentID' => $paymentID, 'patientID' => $request->input('patientID'), 'payment' => $payment, 'date' => date("Y-m-d")]);
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
