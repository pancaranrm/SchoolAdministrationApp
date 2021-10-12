<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MatpelController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UserController;

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
// Route::get('/', [UserController::class, 'guru']);

Route::get('/login', [AuthController::class, 'index']);
Route::post('/loginweb', [AuthController::class, 'login'])->name('auth');

Route::group(['middleware' => 'CekLogin'], function(){
    // jurusan
    Route::get('/', [JurusanController::class, 'index']);
    Route::post('/properti/add', [JurusanController::class, 'store']);
    Route::get('/editProperti/{id}', [JurusanController::class, 'edit']);
    Route::put('/properti/{id}/update', [JurusanController::class, 'update']);
    Route::delete('/deleteProperti/{id}', [JurusanController::class, 'destroy']);

    // kelas
    Route::post('/properti/kelas/add', [KelasController::class, 'store']);
    Route::get('/editProperti/kelas/{id}', [KelasController::class, 'edit']);
    Route::put('/properti/kelas/{id}/update', [KelasController::class, 'update']);
    Route::delete('/deleteProperti/kelas/{id}', [KelasController::class, 'destroy']);

    // siswa
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/add', [SiswaController::class, 'create']);
    Route::post('/siswa/add', [SiswaController::class, 'store']);
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
    Route::post('/siswa/edit/{id}', [SiswaController::class, 'update']);
    Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy']);
    Route::get('/siswa/detail/{id}', [SiswaController::class, 'show']);

    // matpel
    Route::post('/properti/matpel/add', [MatpelController::class, 'store']);
    Route::get('/editProperti/matpel/{id}', [MatpelController::class, 'edit']);
    Route::put('/properti/matpel/{id}/update', [MatpelController::class, 'update']);
    Route::delete('/deleteProperti/matpel/{id}', [MatpelController::class, 'destroy']);

    // Guru
    Route::get('/guru', [GuruController::class, 'index']);
    Route::get('/guru/add', [GuruController::class, 'create']);
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);
    Route::post('/guru/add', [GuruController::class, 'store']);
    Route::post('/guru/edit/{id}', [GuruController::class, 'update']);
    Route::delete('/guru/delete/{id}', [GuruController::class, 'destroy']);
    Route::get('/guru/detail/{id}', [GuruController::class, 'show']);

    // export
    Route::get('/export/siswa', [ExportController::class, 'siswa']);
    Route::get('/export/guru', [ExportController::class, 'guru']);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


