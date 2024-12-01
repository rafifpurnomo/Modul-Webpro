<?php

use App\Http\Controllers\PegawaiController;
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

Route::get('/', [PegawaiController::class, 'index'])->name('pegawais.index');

Route::get('/pegawais/create', function () {
    return view('pegawai/create');
})->name('pegawais.create');
Route::post('/pegawais/store', [PegawaiController::class, 'store'])->name('pegawais.store');

