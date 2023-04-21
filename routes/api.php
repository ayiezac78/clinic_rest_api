<?php

use App\Http\Controllers\Api\PatientsAppointments;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//login route
Route::post('/login', [AuthController::class, 'login']);
//register route
Route::post('/register', [AuthController::class, 'register']);
//forgot route
Route::post('/forgetpassword', [ForgotController::class, 'forgotPassword']);
//get user route
//use middleware to check if user is logged in
Route::get('/user', [UserController::class, 'getUser'])->middleware('auth:api');

//patient's db
Route::get('/appointments',[PatientsAppointments::class,'index']);
Route::post('/appointments/store',[PatientsAppointments::class,'store']);
Route::get('/appointments/delete/{id}', [PatientsAppointments::class, 'delete']);