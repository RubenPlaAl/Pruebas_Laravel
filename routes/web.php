<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/store', function () {
    return view('store');
})->middleware(['auth', 'verified'])->name('store');

Route::get('/forum', function () {
    return view('forum');
})->middleware(['auth', 'verified'])->name('forum');

Route::get('/homepage', function () {
    return view('homepage');
})->middleware(['auth', 'verified'])->name('homepage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/profile',  [ProfileController::class, 'image_update'])->name('profile.image');
require __DIR__ . '/auth.php';


Route::get('/imagen', [ImageController::class, 'create'])->name('image.create');
Route::post('/image/save',  [ImageController::class, 'save'])->name('image.save');
Route::get('/show', [ImageController::class, 'show'])->name('image.show');
Route::get('/image/file/{filename}', [ImageController::class, 'getImage'])->name('image.file');
Route::get('/detail/{id}', [ImageController::class, 'detail'])->name('image.detail');

Route::post('/comment/save',  [CommentController::class, 'save'])->name('comment.save');
