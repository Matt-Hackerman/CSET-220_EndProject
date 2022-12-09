<?php

use App\Http\Controllers\additionalPatientAPI;
use App\Http\Controllers\adminReportAPI;
use Illuminate\Support\Facades\Route;

use App\http\Controllers\UserController;

use App\Http\Controllers\DoctorAppointmentAPI;
use App\Http\Controllers\employeeSearchAPI;
use App\Http\Controllers\registercontrollerAPI;

use App\Http\Controllers\newroster;
use App\Http\Controllers\patientDoctorAPI;
use App\Http\Controllers\patientSearchAPI;
use App\Http\Controllers\PaymentAPI;
use App\Http\Controllers\roleAPI;
use App\Http\Controllers\RosterAPI;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function() {
    return view('login');
});

Route::get('/home', function() {
    return view('home');
});

Route::get('/patienthome', [UserController::class, 'dates']);

Route::get('/caregiverhome', [UserController::class, 'patientCare']);

Route::get('/doctorhome', [UserController::class, 'doctorHome']);

Route::get('/patientFMhome', function() {
    return view('patientFMhome');
});

Route::get('/additionalPatient', [additionalPatientAPI::class, 'index']);

Route::get('/roster', [RosterAPI::class, 'index']);

Route::get('/adminReport', [adminReportAPI::class, 'index']);

Route::get('/patientSearch', [patientSearchAPI::class, 'index']);

Route::get('/emp_search', [employeeSearchAPI::class, 'index']);

Route::get('/role', [roleAPI::class, 'index']);

Route::get('/patientDoctor', [patientDoctorAPI::class, 'index']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/doctorappointment', [DoctorAppointmentAPI::class, 'index']);


Route::get('/registercontroller', [registercontrollerAPI::class, 'index']);



Route::get('/newroster', [newroster::class, 'index']);

Route::get('/payment', [PaymentAPI::class, 'index']);

