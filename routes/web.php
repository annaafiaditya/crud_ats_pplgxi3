<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PinjamController;


Route::get('/', function () {
    return view('pages.home');
});



Route::prefix('/siswas')->name('siswas.')->group(function () {
    Route::get('/add', [SiswaController::class, 'create'])->name('create');
    Route::post('/add', [SiswaController::class, 'store'])->name('store');
    
    Route::get('/', [SiswaController::class, 'index'])->name('index');
    
    Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [SiswaController::class, 'update'])->name('update');
    
    Route::delete('/delete/{id}', [SiswaController::class, 'destroy'])->name('delete');
});

Route::prefix('/pinjams')->name('pinjams.')->group(function () {
    Route::get('/', [PinjamController::class, 'index'])->name('index');
    Route::get('/add', [PinjamController::class, 'create'])->name('create');
    Route::post('/add', [PinjamController::class, 'store'])->name('store');


    Route::get('/edit/{id}', [PinjamController::class, 'edit'])->name('edit');
    Route::patch('/edit/{id}', [PinjamController::class, 'update'])->name('update');

    Route::delete('/delete/{id}', [PinjamController::class, 'destroy'])->name('delete');
});

Route::resource('pinjam', PinjamController::class);


// Route::resource('siswa', SiswaController::class);
