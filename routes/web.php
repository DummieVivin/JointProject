<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route untuk ke Project dan Todo
    Route::get('project', [UserController::class, 'index'])->name('project');
    Route::post('storeproject', [UserController::class, 'storeProject'])->name('storeproject');
    Route::delete('destroyProject/{id}', [UserController::class, 'destroyProject'])->name('destroyProject');

    Route::get('todo', [UserController::class, 'indextodo'])->name('todo');
    Route::get('todocreate/{id}', [UserController::class, 'todocreate'])->name('todocreate');
    Route::put('todostore/{id}', [UserController::class, 'todostore'])->name('todostore');
    Route::delete('tododestroy/{id}', [UserController::class, 'tododestroy'])->name('tododestroy');
    Route::get('todoedit/{id}', [UserController::class, 'todoedit'])->name('todoedit'); // Menampilkan form update
    Route::patch('todoupdate/{id}', [UserController::class, 'updateStatus'])->name('updateStatus'); // Hanya update status
    // Route::post('todo', [UserController::class, 'storetodo'])->name('todo');
});

require __DIR__.'/auth.php';
