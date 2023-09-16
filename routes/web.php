<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users.index'); // Listar todos os usuários
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show'); // Exibir detalhes de um usuário
    // Route::get('/create', [UserController::class, 'create'])->name('users.create');  // Formulário para criar um novo usuário
    Route::post('/', [UserController::class, 'store'])->name('users.store'); // Salvar um novo usuário
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit'); // Formulário para editar um usuário
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update'); // Atualizar um usuário
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('users.destroy'); // Excluir um usuário
});