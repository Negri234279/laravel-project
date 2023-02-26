<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\UserSportController;
use Illuminate\Support\Facades\Route;

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

// AUTH
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('/register', [AuthController::class, 'register'])->name('register-user');
Route::post('/custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');

// ENTRYPOINT
Route::get('/', [ArticleController::class, 'index'])->middleware(['auth'])->name('articles.index');

// ARTICLES
Route::middleware(['admin'])->prefix('articles')->group(function () {
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

// MEMBERS SPORTS
Route::middleware(['auth'])->prefix('user-sports')->group(function () {
    Route::get('/', [UserSportController::class, 'index'])->name('user-sports.index');
    Route::post('/subscribe/{id}', [UserSportController::class, 'store'])->name('user-sports.store');
    Route::delete('/unsubscribe/{id}', [UserSportController::class, 'destroy'])->name('user-sports.destroy');
});

// SPORTS
Route::middleware(['admin'])->prefix('sports')->group(function () {
    Route::get('/', [SportController::class, 'index'])->name('sports.index');
    Route::get('/create', [SportController::class, 'create'])->name('sports.create');
    Route::post('', [SportController::class, 'store'])->name('sports.store');
    Route::get('/{id}/edit', [SportController::class, 'edit'])->name('sports.edit');
    Route::put('/{id}', [SportController::class, 'update'])->name('sports.update');
    Route::delete('/{id}', [SportController::class, 'destroy'])->name('sports.destroy');
});
