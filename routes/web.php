<?php

use App\Http\Controllers\dataAnggotaController;
use App\Http\Controllers\DataPesanaController;
use App\Http\Controllers\tambahmenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function(){
    return view('admin.dashboard');
});

Route::get('/dataPesanan', function(){
    return view('admin.dataPesanan');
});

Route::get('/tambahanggota', function(){
    return view('admin.tambahAnggota');
});

Route::prefix('/dataPesanan')->controller(DataPesanaController::class)->group(function () {
    Route::get('/', 'getAllData');
    Route::get('/dasboard', 'getAllData2');
    Route::post('/createdatapesanan', 'createData')->name('tambahdata');
    Route::delete('/deletedatapesanan/{id}' ,'deleteData')->name('hapus');
});

Route::prefix('/tambahAnggota')->controller(dataAnggotaController::class)->group(function () {
    Route::get('/', 'getAllData2');
    Route::post('/createanggota', 'createData2')->name('tambahdataanggota');
    Route::delete('/deleteanggota/{id}' ,'deleteData2')->name('hapusdataanggota');
});

Route::prefix('/tambahMenu')->controller(tambahmenuController::class)->group(function () {
    Route::get('/', 'getAllDataMenu3');
    Route::post('/createmenu', 'tambahdatamenu3')->name('tambahdatamenu');
    Route::get('/editdatamenu/{id}', 'ditdatamenu3')->name('editdatamenu');
    Route::post('/updatedatamenu/{id}', 'updatedatamenu3')->name('updatedatamenu');
    Route::delete('/deletemenu/{id}' ,'hapusdatamenu3')->name('hapusdatamenu');
});


