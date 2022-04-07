<?php

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/home', function () {
    return view('home', [
        'title' => 'Home',
        'users' => User::all(),
        'posts' => Post::where('post_category_id', 1)->get(),
        'comments' => Comment::all(),
        'likes' => Like::all()
    ]);
})->middleware('auth');

Route::get('/menfess', [PostController::class, 'allFess'])->middleware('auth');
Route::get('/menfess/{posts}', [PostController::class, 'showFess'])->middleware('auth');

Route::get('/{author:username}/status', [PostController::class, 'all'])->middleware('auth');
Route::get('/{author:username}/status/{posts}', [PostController::class, 'show'])->middleware('auth');

Route::get('/', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::get('/register', [AuthController::class, 'regindex'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
