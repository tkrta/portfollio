<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StampController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TodoController;

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


Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [TodoController::class, 'toppage'])-> name('top');
    Route::get('/todos', [TodoController::class, 'newtodo'])-> name('todo');
    Route::post('/todos', [TodoController::class, 'store']);
    Route::get('/todos/{todo}', [TodoController::class, 'show']);
    Route::post('/todos/{todo}', [TodoController::class, 'did']);
    Route::put('/todos/{todo}', [TodoController::class, 'back']);
    Route::delete('/todos/{todo}', [TodoController::class, 'delete']);
    
    Route::get('/posts', [PostController::class, 'index'])-> name('post');
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::get('/posts/{post}', [PostController::class, 'show']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
    Route::put('posts/{post}', [PostController::class, 'update']);
    Route::delete('/posts/{post}', [PostController::class,'delete']);
    
    Route::get('/like/{post}', [PostController::class, 'like']);
    Route::get('/unlike/{post}', [PostController::class, 'unlike']);
    
    Route::get('/posts/replies/{post}', [ReplyController::class, 'index']);
    Route::get('/posts/replies/{post}/create', [ReplyController::class, 'create']);
    Route::get('/posts/replies/{post}/{reply}', [ReplyController::class, 'show']);
    Route::post('/posts/replies/{post}', [ReplyController::class, 'store']);
    Route::get('/posts/replies/{post}/{reply}/edit', [ReplyController::class, 'edit']);
    Route::put('/posts/replies/{post}/{reply}', [ReplyController::class, 'update']);
    Route::delete('/posts/replies/{post}/{reply}', [ReplyController::class, 'delete']);
    
    Route::get('/stamps', [StampController::class, 'index'])-> name('shop');
    Route::post('/stamps/{stamp}', [StampController::class, 'buy']);
    Route::put('/stamps/{stamp}', [StampController::class, 'update']);
    
    Route::get('/cards', [CardController::class, 'index']);
    Route::post('/cards/{card}', [CardController::class, 'buy']);
    Route::put('/cards/{card}', [CardController::class, 'update']);
    
    Route::get('/histories', [HistoryController::class, 'index'])-> name('history');
    
    Route::get('/missions', [MissionController::class, 'index'])-> name('mission');
    Route::put('/missions/{user}', [MissionController::class, 'point']);
    Route::get('/missions/{mission}', [MissionController::class, 'progressed']);
});
