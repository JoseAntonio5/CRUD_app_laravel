<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {

    // MENSAGENS DE ERRO CUSTOMIZADAS
    private function validationMessages() {
        return [
            'email.email' => 'O E-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'Este endereço de e-mail já está em uso.',
            'data_nascimento.date' => 'A Data de Nascimento deve ser uma data válida.',
            'telefone.regex' => 'O campo Telefone deve estar no formato (xx) xxxxx-xxxx.',
        ];
    }

    // FUNÇÃO PARA VALIDAR OS DADOS VINDOS DO FORMULÁRIO
    private function validateUser(Request $request) {
        return $request->validate([
            'nome_completo' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|regex:/^\(\d{2}\) \d{5}-\d{4}$/',
        ], $this->validationMessages());
    }

    public function index() {
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }

    public function show(User $user) {
        return view('users.show', ['user' => $user]);
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $data = $this->validateUser($request);
        $newUser = User::create($data);

        return redirect(route('users.index'));

    }

    public function edit(User $user) {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user, Request $request) {
        $updatedData = $this->validateUser($request);
        $user->update($updatedData);

        return redirect(route('users.index'))->with('success', 'Os dados do usuario foram atualizados com sucesso.');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect(route('users.index'))->with('success', 'O usuario foi excluido com sucesso.');
    }
}