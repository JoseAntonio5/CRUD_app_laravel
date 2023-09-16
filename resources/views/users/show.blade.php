@extends('layout.layout')

@section('content')
    <div class="show-content">
        <h1>Usuário: <span class="show-content-name">{{$user->nome_completo}}</span></h1>
        
        <div class="show-content-info">
            <h3>Informações:</h3>
            <p>E-mail: {{$user->email}}</p>
            <p>Telefone: {{$user->telefone}}</p>
            <p>Idade: {{calculaIdade($user->data_nascimento)}}</p>
        </div>

        <div class="show-content-buttons">
            <a href="{{route('users.edit', ['user' => $user])}}">
                <button class="show-content-btn edit">Editar</button>
            </a>
            <form method="post" action="{{route('users.destroy', ['user' => $user])}}">
                @csrf
                @method('delete')
                <button class="show-content-btn destroy">Excluir</button>
            </form>
        </div>

    </div>
@endsection

<!-- Função em PHP para calcular a idade da pessoa baseado no ano de nascimento -->
@php
    function calculaIdade($dataNascimento) {
        $dataNascimento = new DateTime($dataNascimento);
        $dataAtual = new DateTime();
        $age = $dataAtual->diff($dataNascimento)->y;
        return $age;
    }
@endphp