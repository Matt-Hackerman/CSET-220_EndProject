<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorAppointmentAPI;
use App\Http\Controllers\newroster;
use App\Http\Controllers\PaymentAPI;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('doctorappointment', DoctorAppointmentAPI::class);
Route::resource('payment', PaymentAPI::class);
Route::resource('newroster', newroster::class);