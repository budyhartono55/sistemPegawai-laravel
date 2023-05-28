<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

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
    return view('welcome');
});

// pegawai
Route::get('/pegawai', [EmployeeController::class, "index"])->name("pegawai");

Route::get('/pegawai/addPegawai', [EmployeeController::class, "addPegawai"])->name("addPegawai");
// actions
Route::get('/pegawai/detailsPegawai/{id}', [EmployeeController::class, "editPegawai"])->name("editPegawai");
Route::post('/insertData', [EmployeeController::class, "insertData"])->name("insertData");
Route::post('/updatePegawai/{id}', [EmployeeController::class, "updatePegawai"])->name("updatePegawai");
Route::get('/deleteData/{id}', [EmployeeController::class, "deleteData"])->name("deleteData");