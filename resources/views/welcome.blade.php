<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <style>

        .main {
            width: 100%;
            heigth: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        h1 {
            font-size: 5rem;
        }

        a {
            font-size: 2rem;
        }
    </style>

    <div class="main">
        <main>
            <h1>CRUD APP</h1>
            <a href="{{route('users.index')}}">Página Inicial</a>
        </main>
    </div>

    <footer>
        <p>Desenvolvido por José Antônio &copy; 2023</p>
    </footer>
</body>
</html>