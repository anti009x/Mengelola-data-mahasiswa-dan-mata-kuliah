<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataMahasiswaController;
use App\Http\Controllers\DataMataKuliahController;

// Route::resource('mahasiswas', DataMahasiswaController::class);
Route::get('/', [DataMahasiswaController::class, 'index'])->name('mahasiswas.index');
Route::get('/mahasiswas/create', [DataMahasiswaController::class, 'create'])->name('mahasiswas.create');
Route::post('/mahasiswas', [DataMahasiswaController::class, 'store'])->name('mahasiswas.store');
Route::get('/mahasiswas/{dataMahasiswa}/edit', [DataMahasiswaController::class, 'edit'])->name('mahasiswas.edit');
Route::put('/mahasiswas/{dataMahasiswa}', [DataMahasiswaController::class, 'update'])->name('mahasiswas.update');
Route::delete('/mahasiswas/{dataMahasiswa}', [DataMahasiswaController::class, 'destroy'])->name('mahasiswas.destroy');
Route::get('/mahasiswas/profile', [DataMahasiswaController::class, 'profile'])->name('mahasiswas.profile');

Route::get('/home/mata_kuliahs', [DataMataKuliahController::class, 'index'])->name('mata_kuliahs.index');
Route::get('/mata_kuliahs/create', [DataMataKuliahController::class, 'create'])->name('mata_kuliahs.create');
Route::post('/mata_kuliahs', [DataMataKuliahController::class, 'store'])->name('mata_kuliahs.store');
Route::get('/mata_kuliahs/{dataMataKuliah}/edit', [DataMataKuliahController::class, 'edit'])->name('mata_kuliahs.edit');
Route::put('/mata_kuliahs/{dataMataKuliah}', [DataMataKuliahController::class, 'update'])->name('mata_kuliahs.update');
Route::delete('/mata_kuliahs/{dataMataKuliah}', [DataMataKuliahController::class, 'destroy'])->name('mata_kuliahs.destroy');
// routes/web.php
Route::get('/download/syarat/{id}', [DataMataKuliahController::class, 'downloadSyarat'])->name('download.syarat');
