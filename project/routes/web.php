<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorAppointmentAPI;

use App\Http\Controllers\registercontrollerAPI;

use App\Http\Controllers\newroster;
use App\Http\Controllers\PaymentAPI;


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

Route::get('/login', function () {
    return view('login');
});
Route::get('/roster', function () {
    return view('roster');
});
Route::get('/role', function () {
    return view('role');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/doctorappointment', [DoctorAppointmentAPI::class, 'index']);


Route::get('/registercontroller', [registercontrollerAPI::class, 'index']);



Route::get('/newroster', [newroster::class, 'index']);

Route::get('/payment', [PaymentAPI::class, 'index']);


