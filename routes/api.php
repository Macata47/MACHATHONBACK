<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\BootcampController;
use App\Http\Controllers\API\BackendtechnologyController;
use App\Http\Controllers\API\FrontendtechnologyController;
use App\Http\Controllers\API\ControlversionController;
use App\Http\Controllers\API\LevelController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\UserBackendtechLevelController;
use App\Http\Controllers\Api\UserFrontendTechLevelController;
use App\Http\Controllers\Api\UserControlversionLevelController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserTeamController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('roles', RoleController::class);



Route::get('/bootcamps', [BootcampController::class, 'index']);
Route::post('/bootcamps', [BootcampController::class, 'store']);
Route::get('/bootcamps/{bootcamp}', [BootcampController::class, 'show']);
Route::put('/bootcamps/{bootcamp}', [BootcampController::class, 'update']);
Route::delete('/bootcamps/{bootcamp}', [BootcampController::class, 'destroy']);



Route::get('/backendtechnologies', [BackendtechnologyController::class, 'index']);
Route::post('/backendtechnologies', [BackendtechnologyController::class, 'store']);
Route::get('/backendtechnologies/{backendTechnology}', [BackendtechnologyController::class, 'show']);
Route::put('/backendtechnologies/{backendTechnology}', [BackendtechnologyController::class, 'update']);
Route::delete('/backendtechnologies/{backendTechnology}', [BackendtechnologyController::class, 'destroy']);



Route::get('/frontendtechnologies', [FrontendtechnologyController::class, 'index']);
Route::post('/frontendtechnologies', [FrontendtechnologyController::class, 'store']);
Route::get('/frontendtechnologies/{frontendTechnology}', [FrontendtechnologyController::class, 'show']);
Route::put('/frontendtechnologies/{frontendTechnology}', [FrontendtechnologyController::class, 'update']);
Route::delete('/frontendtechnologies/{frontendTechnology}', [FrontendtechnologyController::class, 'destroy']);


Route::get('/controlversions', [ControlversionController::class, 'index']);
Route::post('/controlversions', [ControlversionController::class, 'store']);
Route::get('/controlversions/{controlVersion}', [ControlversionController::class, 'show']);
Route::put('/controlversions/{controlVersion}', [ControlversionController::class, 'update']);
Route::delete('/controlversions/{controlVersion}', [ControlversionController::class, 'destroy']);



Route::get('/levels', [LevelController::class, 'index']);
Route::post('/levels', [LevelController::class, 'store']);
Route::get('/levels/{level}', [LevelController::class, 'show']);
Route::put('/levels/{level}', [LevelController::class, 'update']);
Route::delete('/levels/{level}', [LevelController::class, 'destroy']);



Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);



Route::get('/user-backendtech-levels', [UserBackendtechLevelController::class, 'index']);
Route::post('/user-backendtech-levels', [UserBackendtechLevelController::class, 'store']);



Route::get('/user-frontend-tech-levels', [UserFrontendTechLevelController::class, 'index']);
Route::post('/user-frontend-tech-levels', [UserFrontendTechLevelController::class, 'store']);
Route::get('/user-frontend-tech-levels/{id}', [UserFrontendTechLevelController::class, 'show']);
Route::put('/user-frontend-tech-levels/{id}', [UserFrontendTechLevelController::class, 'update']);
Route::delete('/user-frontend-tech-levels/{id}', [UserFrontendTechLevelController::class, 'destroy']);



Route::get('/user-controlversion-levels', [UserControlversionLevelController::class, 'index']);
Route::post('/user-controlversion-levels', [UserControlversionLevelController::class, 'store']);
Route::get('/user-controlversion-levels/{id}', [UserControlversionLevelController::class, 'show']);
Route::put('/user-controlversion-levels/{id}', [UserControlversionLevelController::class, 'update']);
Route::delete('/user-controlversion-levels/{id}', [UserControlversionLevelController::class, 'destroy']);



Route::get('/teams', [TeamController::class, 'index']);
Route::post('/teams', [TeamController::class, 'store']);
Route::get('/teams/{id}', [TeamController::class, 'show']);
Route::put('/teams/{id}', [TeamController::class, 'update']);
Route::delete('/teams/{id}', [TeamController::class, 'destroy']);



Route::get('/user-teams', [UserTeamController::class, 'index']);
Route::post('/user-teams', [UserTeamController::class, 'store']);
Route::get('/user-teams/{id}', [UserTeamController::class, 'show']);
Route::put('/user-teams/{id}', [UserTeamController::class, 'update']);
Route::delete('/user-teams/{id}', [UserTeamController::class, 'destroy']);









