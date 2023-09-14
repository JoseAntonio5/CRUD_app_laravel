<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        // recupera todos os usuarios
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {

        // dd($request);

        $data = $request->validate([
            'nome_completo' => 'required',
            'email' => 'required',
            'data_nascimento' => 'required',
            'telefone' => 'required'
        ]);

        $newUser = User::create($data);

        return redirect(route('users.index'));

    }

    public function edit(User $user) {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request) {
        $updatedData = $request->validate([
            'nome_completo' => 'required',
            'email' => 'required',
            'data_nascimento' => 'required',
            'telefone' => 'required'
        ]);

        $user->update($updatedData);

        return redirect(route('users.index'))->with('success', 'Os dados do usuario foram atualizados com sucesso.');
    }

    public function delete(User $user) {
        $user->delete();

        return redirect(route('users.index'))->with('success', 'O usuario foi excluido com sucesso.');
    }
}
