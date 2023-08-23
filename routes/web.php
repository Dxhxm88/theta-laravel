<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pokemons', [PokemonController::class, 'fetch'])->name('pokemon.index');

Auth::routes();

// Authenticate user group
Route::middleware('auth')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // profile.*
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::put('/update', [ProfileController::class, 'update'])->name('update');
    });

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    // post.*
    Route::prefix('post')->name('post.')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
        Route::get('/edit/{post}', [PostController::class, 'edit'])->name('edit');
        Route::put('/update/{post}', [PostController::class, 'update'])->name('update');
        Route::get('/destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
    });

    Route::post('/comment/{post}', [CommentController::class, 'store'])->name('comment.store');
});
