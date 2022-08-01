<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('password', function(){
        return bcrypt('zera');
    });

Route::group(['prefix'=> 'v1'], function() {
    Route::get('jabatan', [JabatanController::class, 'index']);
    Route::post('jabatan', [JabatanController::class, 'add'])->middleware('auth:api');
    Route::get('jabatan/{id}', [JabatanController::class, 'show']);
    Route::patch('jabatan/{id}', [JabatanController::class, 'update'])->middleware('auth:api');
    Route::delete('jabatan/{id}', [JabatanController::class, 'destroy'])->middleware('auth:api');

    Route::get('golongan', [GolonganController::class, 'index']);
    Route::post('golongan', [GolonganController::class, 'add'])->middleware('auth:api');
    Route::get('golongan/{id}', [GolonganController::class, 'show']);
    Route::patch('golongan/{id}', [GolonganController::class, 'update'])->middleware('auth:api');
    Route::delete('golongan/{id}', [GolonganController::class, 'destroy'])->middleware('auth:api');

    Route::get('pegawai', [PegawaiController::class, 'index']);
    Route::post('pegawai', [PegawaiController::class, 'add'])->middleware('auth:api');
    Route::get('pegawai/{id}', [PegawaiController::class, 'show']);
    Route::patch('pegawai/{id}', [PegawaiController::class, 'update'])->middleware('auth:api');
    Route::delete('pegawai/{id}', [PegawaiController::class, 'destroy'])->middleware('auth:api');

});

Route::group(['middleware' => 'api', 'namespace' => 'App\Http\Controllers', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});