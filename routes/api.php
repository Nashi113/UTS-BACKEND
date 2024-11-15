<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/patients', [PatientsController::class, 'index']);
Route::post('/patients', [PatientsController::class, 'store']);
Route::put('/patients/{patient}', [PatientsController::class, 'update']);
Route::get('/patients/{id}', [PatientsController::class, 'show']);
Route::delete('/patients/{patient}', [PatientsController::class, 'destroy']);
Route::get('/patients/search/{nama}', [PatientsController::class, 'search']);