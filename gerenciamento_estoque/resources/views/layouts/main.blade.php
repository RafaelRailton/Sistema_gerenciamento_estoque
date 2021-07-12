<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    <!-- Fonte do Google -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS da Aplicação -->
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/script.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="https://image.flaticon.com/icons/png/512/1729/1729574.png" alt="logo_patinha"></a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/products/create" class="nav-link">Cadastrar seu Produto</a>
                    </li>
                  
                    @auth
                    <li class="nav-item">
                        <a href="/relatorios" class="nav-link">Listagem de Relatorios</a>
                    </li>
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Meus Produtos</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="POST">
                        @csrf 
                        <a href="/logout" class="nav-link" onclick="event.preventDefault();
                        this.closest('form').submit();">Sair</a>
                    </form>
                    </li>
                    @endauth
                  @guest  
                  <li class="nav-item">
                        <a href="/login" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Criar Conta</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
<main>
    <div class="container-fluid">
        <div class="row">
            @if(session('msg'))
            <p class="msg">{{session('msg')}}</p>
            @endif
        @yield('content')
        </div>
    </div>
</main>
   


    <footer>
        <p>Gerenciamento de Estoque &copy; 2021</p>
    </footer>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>