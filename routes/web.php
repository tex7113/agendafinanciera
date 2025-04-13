<?php

use App\Http\Controllers\PruebaFirestoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/finanzas', [PruebaFirestoreController::class, 'test'])->name('finanza.index');
Route::get('/finanzas1', [PruebaFirestoreController::class, 'test1'])->name('finanza.index');
Route::get('/finanzas2', [PruebaFirestoreController::class, 'test2'])->name('finanza.index');
Route::get('/firestore', [PruebaFirestoreController::class, 'guardarEnFirestore']);
