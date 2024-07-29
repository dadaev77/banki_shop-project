<?php

use App\Http\Controllers\ParameterController;
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

Route::get('/', [ParameterController::class, 'index'])->name('parameters.index');
Route::get('/parameters/{parameter}', [ParameterController::class, 'show'])->name('parameters.show');
Route::get('/parameters/{parameter}/edit', [ParameterController::class, 'edit'])->name('parameters.edit');
Route::put('/parameters/{parameter}', [ParameterController::class, 'update'])->name('parameters.update');
Route::delete('/parameters/{parameter}/{iconType}', [ParameterController::class, 'destroyIcon'])->name('parameters.destroyIcon');
