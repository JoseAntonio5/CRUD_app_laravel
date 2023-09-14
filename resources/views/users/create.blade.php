<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App | Edit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <h1>CRUD App</h1>
        <a href="{{route('users.index')}}">Página Inicial</a>
        <a href="{{route('users.create')}}">Criar Usuário</a>
    </nav>

    <div class="home-text">
        <h3>Criar um novo usuário</h3>
        <p>Preencha os campos abaixo para criar um novo usuário</p>
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

    <form class="user-form" method="post" action="{{route('users.store')}}">
        @csrf
        @method('post')

        <div>
            <label for="nome_completo">Nome:</label><br>
            <input type="text" id="nome_completo" name="nome_completo" placeholder="Nome Completo" required />
        </div>
        <div>
            <label for="email">E-mail:</label><br>
            <input type="text" id="email" name="email" placeholder="E-mail" required />
        </div>
        <div>
            <label for="data_nascimento">Data de Nascimento:</label><br>
            <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de Nascimento" required>
        </div>
        <div>
            <label for="telefone">Telefone:</label><br>
            <input type="tel" id="telefone" name="telefone" placeholder="Digite apenas números" required>
        </div>
        
        <input class="form-btn" type="submit" value="Criar Usuário">
    </form>

    <footer>
        <p>Desenvolvido por José Antônio &copy; 2023</p>
    </footer>
</body>
</html>