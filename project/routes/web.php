<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorAppointmentAPI;

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

Route::get('/newroster', function () {
    return view('newroster');
});

Route::get('/payment', function () {
    return view('payment');
});

