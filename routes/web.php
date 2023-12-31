<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('welcome');
})->name('blog');

Route::get('/about-me', function () {
    return view('welcome');
})->name('aboutMe');

Route::get('/blog/{id}', function () {
    return view('blog.show');
})->name('readBlog');

Route::prefix('dashboard')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('createPost');
    Route::post('/store', [PostController::class, 'store'])->name('storePost');
});
