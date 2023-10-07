<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    Route::resource('attendance', \App\Http\Controllers\AttendanceController::class);
    Route::resource('major', \App\Http\Controllers\MajorController::class);
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::get('qrcode',[\App\Http\Controllers\HomeController::class,'qr_scanner']);
    Route::resource('prefix',\App\Http\Controllers\PrefixController::class);
    Route::get('record/attendance/{id}',[\App\Http\Controllers\AttendanceController::class,'record']);
    Route::post('record/attendance',[\App\Http\Controllers\AttendanceController::class,'recorded']);
    Route::get('change/password/{id}',[\App\Http\Controllers\UserController::class,'changePass']);
    Route::get('student/prefix',[\App\Http\Controllers\SettingController::class,'prefix']);
    Route::post('prefix/update/{id}',[\App\Http\Controllers\SettingController::class,'prefixUpdate']);
    Route::resource('payments',\App\Http\Controllers\PaymentController::class);
});
Route::get('forgot/password',[\App\Http\Controllers\UserController::class,'forgot_password']);
Route::post('reset',[\App\Http\Controllers\UserController::class,'reset']);
Auth::routes();
Route::get('test',function (){
   return view('welcome');
});

