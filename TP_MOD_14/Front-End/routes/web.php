<?php

use App\Http\Controllers\MovieController;
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

Route::get('/', [MovieController::class, 'getAllMovies'])->name('homeMovie');

Route::get('/movies/add', [MovieController::class, 'showAddMovieForm'])->name('movies.add');
Route::post('/movies/add', [MovieController::class, 'addMovie'])->name('movies.store');
Route::delete('/movies/delete/{id_movies}', [MovieController::class, 'deleteMovie'])->name('movies.delete');
Route::get('/movies/edit/{id_movies}', [MovieController::class, 'editMovie'])->name('movies.edit'); 
Route::put('/movies/update/{id_movies}', [MovieController::class, 'updateMovie'])->name('movies.update');