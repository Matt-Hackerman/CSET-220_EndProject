<?php

use App\Http\Controllers\additionalPatientAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\http\Controllers\UserController;

use App\Http\Controllers\DoctorAppointmentAPI;

use App\Http\Controllers\registerapprovalAPI;

use App\Http\Controllers\employeeSearchAPI;


use App\Http\Controllers\newroster;
use App\Http\Controllers\patientDoctorAPI;
use App\Http\Controllers\PaymentAPI;
use App\Http\Controllers\roleAPI;

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



Route::post('/login', [UserController::class, 'userLogin']);

Route::post('/logout', [UserController::class, 'userLogout']);

Route::post('/previous_day', [UserController::class, 'patientCheckList']);

Route::post('/updateCheckList', [UserController::class, 'updateCheckList']);

Route::resource('doctorappointment', DoctorAppointmentAPI::class);


Route::resource('registerapproval', registerapprovalAPI::class);

Route::resource('additionalPatient', additionalPatientAPI::class);
Route::resource('emp_search', employeeSearchAPI::class);
Route::resource('role', roleAPI::class);
Route::resource('patientDoctorAPI', patientDoctorAPI::class);


Route::resource('registercontroller', registercontrollerAPI::class);

Route::resource('payment', PaymentAPI::class);

Route::resource('newroster', newroster::class);



