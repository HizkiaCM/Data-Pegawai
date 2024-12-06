<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UnitKerjaController;
use App\Exports\PegawaiExport;



// Route::get('/', function () {
//     return view('welcome');
// });
//Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

//Tampilan awal
Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('register/verify/{verify_key}', [RegisterController::class, 'verify'])->name('verify');

// Route::get('/pegawai', [PegawaiController::class, 'index']);
// Menampilkan pegawai.blade.php setelah login
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store'); // Tambahkan ini
Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
Route::get('/pegawai/search', [PegawaiController::class, 'search'])->name('pegawai.search');
// Route untuk menampilkan form upload dengan metode GET
Route::get('pegawai/upload/{id}', [PegawaiController::class, 'showUploadForm'])->name('pegawai.upload.form');

// Route untuk mengunggah foto dengan metode POST
Route::post('pegawai/upload', [PegawaiController::class, 'uploadFoto'])->name('pegawai.upload');

// Route untuk menampilkan daftar pegawai dengan metode GET
Route::get('pegawai/upload', [PegawaiController::class, 'selectPegawai'])->name('pegawai.upload.select');

// Route untuk mendownload data pegawai
Route::get('/export-pegawai', [PegawaiController::class, 'export'])->name('export');
Route::get('download-pdf', [PegawaiController::class, 'downloadPdf'])->name('download-pdf');

Route::get('/pegawai/pdf-test', function () {
    $pegawais = App\Models\Pegawai::all();
    return view('pegawai.pegawai_pdf', compact('pegawais'));
});

Route::get('/pegawai/unit-kerja/{unitKerja}', [PegawaiController::class, 'filterByUnitKerja'])->name('pegawai.filterByUnitKerja');
Route::get('/pegawai/unit-kerja', [PegawaiController::class, 'showByUnitKerja'])->name('pegawai.showByUnitKerja');

Route::get('/get-units', [UnitKerjaController::class, 'getUnits'])->name('get.units');
Route::get('/pegawai/filter', [PegawaiController::class, 'filterByUnitKerja'])->name('pegawai.filter');

