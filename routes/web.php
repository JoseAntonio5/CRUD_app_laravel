<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/user', [UserController::class, 'index'])->name('users.index');

Route::get('/user/new', [UserController::class, 'create'])->name('users.create');

Route::post('/user', [UserController::class, 'store'])->name('users.store');

Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::put('/user/{user}/editar', [UserController::class, 'update'])->name('users.update');

Route::delete('/user/{user}/delete', [UserController::class, 'delete'])->name('users.delete');