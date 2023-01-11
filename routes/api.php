<?php

use Illuminate\Http\Request;
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









