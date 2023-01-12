<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DayworkController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProgrouptableController;
use App\Http\Controllers\CheckdataController;
use App\Http\Controllers\CheckdayworkController;
use App\Http\Controllers\CheckprojectController;
use App\Http\Controllers\CheckemployeController;
use App\Http\Controllers\CheckhistoryprojectController;
use App\Http\Controllers\DayworkprojectController;
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
    return view('index');
});

Route::resource('Student',StudentController::class);
Route::resource('Login',LoginController::class);
Route::resource('Signup',SignupController::class);
Route::resource('Daywork',DayworkController::class);
Route::resource('Employe',EmployeController::class);
Route::resource('Project',ProjectController::class);
Route::resource('Progrouptable',ProgrouptableController::class);
Route::resource('Checkdata',CheckdataController::class);
Route::resource('Checkdaywork',CheckdayworkController::class);
Route::resource('Checkproject',CheckprojectController::class);
Route::resource('Checkemploye',CheckemployeController::class);
Route::resource('Checkhistoryproject',CheckhistoryprojectController::class);
Route::resource('Dayworkproject',DayworkprojectController::class);