<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('me', [AuthController::class, 'me'])->middleware('auth:api');
    Route::post('profilUpdate', [ProfilController::class, 'update']);
    Route::post('kritik', [FormController::class, 'kritikForm'])->middleware('auth:api');
    Route::post('pengaduan', [FormController::class, 'pengaduanForm'])->middleware('auth:api');
    Route::get('Riwayat-Kritik', [FormController::class, 'RiwayatKritik'])->middleware('auth:api');
    Route::get('Riwayat-Pengaduan', [FormController::class, 'RiwayatPengaduan'])->middleware('auth:api');
    Route::get('Survei', [FormController::class, 'Survei'])->middleware('auth:api');
});