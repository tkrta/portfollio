<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'create']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('posts/{post}', [PostController::class, 'update']);
Route::delete('/posts/{post}', [PostController::class,'delete']);

Route::get('/like/{post}', [PostController::class, 'like']);
Route::get('/unlike/{post}', [PostController::class, 'unlike']);

Route::get('/posts/{post}', [ReplyController::class, 'index']);
Route::get('/posts/{post}/create', [ReplyController::class, 'create']);
Route::get('/posts/{post}/{reply}', [ReplyController::class, 'show']);
Route::post('/posts/{post}', [ReplyController::class, 'store']);
