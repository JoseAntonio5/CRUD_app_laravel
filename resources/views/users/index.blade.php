@extends('layout.layout')

@section('content')
    <div class="home-text">
        <h3>Todos os usuários</h3>
        <p>Lista completa com todos os usuários cadastrados no sistema.</p>
    </div>

    <div>
        @if(session()->has('success'))
            <div style="text-align: center; font-size: 1.2rem; color: red; margin-bottom: 1rem">
                {{session('success')}}
            </div>
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>
                    <a href="{{route('users.show', ['user' => $user])}}">{{$user->nome_completo}}</a>
                </td>
                <td>{{$user->email}}</td>
                <td>{{date('d/m/Y', strtotime($user->data_nascimento))}}</td>
                <td>{{$user->telefone}}</td>
                <td style="font-weight: bold; text-align: center">
                    <a href="{{route('users.edit', ['user' => $user])}}">Editar</a>
                </td>
                <td style="text-align: center">
                    <form method="post" action="{{route('users.destroy', ['user' => $user])}}">
                        @csrf
                        @method('delete')
                        <input class="home-btn" type="submit" value="Excluir" />
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection