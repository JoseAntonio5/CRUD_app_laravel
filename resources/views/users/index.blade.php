<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <h1>CRUD App</h1>
        <a href="{{route('users.index')}}">Página Inicial</a>
        <a href="{{route('users.create')}}">Criar Usuário</a>
    </nav>

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
                <td>{{$user->nome_completo}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->data_nascimento}}</td>
                <td>{{$user->telefone}}</td>
                <td style="font-weight: bold; text-align: center">
                    <a href="{{route('users.edit', ['user' => $user])}}">Editar</a>
                </td>
                <td style="text-align: center">
                    <form method="post" action="{{route('users.delete', ['user' => $user])}}">
                        @csrf
                        @method('delete')
                        <input class="home-btn" type="submit" value="Excluir" />
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <footer>
        <p>Desenvolvido por José Antônio &copy; 2023</p>
    </footer>
</body>
</html>