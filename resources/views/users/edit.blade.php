<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App | New</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <h1>CRUD App</h1>
        <a href="{{route('users.index')}}">Página Inicial</a>
        <a href="{{route('users.create')}}">Criar Usuário</a>
    </nav>

    <div class="home-text">
        <h1>Editar usuário: <span>{{$user->nome_completo}}</span></h1>
        <h3>Edite os dados do usuário</h3>
    </div>

    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form class="user-form" method="post" action="{{route('users.update', ['user' => $user])}}">
        @csrf
        @method('put')

        <div>
            <label for="nome_completo">Nome:</label>
            <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo" value="{{$user->nome_completo}}" required />
        </div>
        <div>
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" placeholder="E-mail" value="{{$user->email}}" required />
        </div>
        <div>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento" value="{{$user->data_nascimento}}" required>
        </div>
        <div>
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" name="telefone" placeholder="Digite apenas números" value="{{$user->telefone}}" required>
        </div>
        
        <input class="form-btn" type="submit" value="Atualizar Usuário">
    </form>

    <footer>
        <p>Desenvolvido por José Antônio &copy; 2023</p>
    </footer>
</body>
</html>