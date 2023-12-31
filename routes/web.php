<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/results', [HomeController::class, 'results'])->name('home.results');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/dashboard', [UserController::class, 'create'])->middleware('verified')->name('dashboard');
    Route::post('/users/answer', [UserController::class, 'store'])->name('users.store');

    Route::post('/dashboard', [QuestionController::class, 'store'])->name('questions.store');
    Route::get('/show/{id}', [QuestionController::class, 'show'])->name('questions.show');
});


require __DIR__ . '/auth.php';
