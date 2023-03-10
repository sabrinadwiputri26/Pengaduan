<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ResponseController;
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

Route::get('/login',[PengaduanController::class, 'login'])->name('login');
Route::post('auth',[PengaduanController::class, 'auth'])->name('auth');
Route::get('/',[PengaduanController::class, 'home']);
Route::get('/petugas',[PengaduanController::class, 'petugas'])->name('petugas');
Route::get('/create',[PengaduanController::class, 'create']);
Route::post('/kirim-data',[PengaduanController::class, 'store'])->name('kirim_data');
Route::get('/create',[PengaduanController::class, 'create']); 
Route::post('/store',[PengaduanController::class, 'store']);
Route::get('/dashboard',[PengaduanController::class, 'home'])->name('dashboard');

Route::middleware('isLogin','CekRole:petugas')->group(function(){
    Route::get('/data/petugas',[PengaduanController::class, 'petugas'])->name('data.petugas'); 
    Route::get('/response/edit/{pengaduan_id}',[ResponseController::class, 'edit'])->name('response.edit');
    Route::patch('/response/update/{pengaduan_id}',[ResponseController::class, 'update'])->name('response.update');  
});

Route::middleware('isLogin','CekRole:admin,petugas')->group(function(){
     Route::delete('/delete/{id}',[PengaduanController::class, 'destroy'])->name('destroy');
    Route::get('/logout',[PengaduanController::class, 'logout'])->name('logout');
});

Route::middleware('isLogin','CekRole:admin')->group(function(){
    Route::delete('/delete/{id}',[PengaduanController::class, 'destroy'])->name('destroy');
    Route::get('/data',[PengaduanController::class, 'data'])->name('data'); 
    Route::get('/export/pdf',[PengaduanController::class, 'exportPDF'])->name('export-PDF');
    Route::get('/created/export/pdf/{id}',[PengaduanController::class, 'createdPDF'])->name('created.PDF');
    Route::get('/export/excel',[PengaduanController::class, 'exportExcel'])->name('export-excel');

});