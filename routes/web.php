<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\VisitorController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//Route Type
Route::get('/type', [TypeController::class, 'index']);
Route::get('/type/create', [TypeController::class, 'create']);
Route::post('/type/store', [TypeController::class, 'store']);
Route::get('/type/show/{id}', [TypeController::class, 'show']);
Route::get('/type/edit/{id}', [TypeController::class, 'edit']);
Route::put('/type/update', [TypeController::class, 'update']);
Route::get('/type/delete/{id}', [TypeController::class, 'destroy']);

//Route Book
Route::get('/book', [BookController::class, 'index']);

Route::get('/book/create', [BookController::class, 'create']);
Route::post('/book/store', [BookController::class, 'store']);

Route::get('/book/edit/{id}', [BookController::class, 'edit']);
Route::put('/book/update', [BookController::class, 'update']);

Route::get('/book/delete/{id}', [BookController::class, 'destroy']);
Route::get('/book/show/{id}', [BookController::class, 'show']);
Route::get('/book/lend/{id}', [BookController::class, 'lend']);
Route::post('/book/lending', [BookController::class, 'lending']);

//Route Archive
Route::get('/archive', [ArchiveController::class, 'index']);

//Route Visitor
Route::get('/visitor', [VisitorController::class, 'index']);

Route::get('/visitor/create', [VisitorController::class, 'create']);
Route::post('/visitor/store', [VisitorController::class, 'store']);

Route::get('/visitor/edit/{id}', [VisitorController::class, 'edit']);
Route::put('/visitor/update', [VisitorController::class, 'update']);

Route::get('/visitor/delete/{id}', [VisitorController::class, 'destroy']);
Route::get('/visitor/show/{id}', [VisitorController::class, 'show']);
