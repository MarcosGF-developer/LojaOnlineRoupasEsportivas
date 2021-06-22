<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Roupas Esportivas</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2>Roupas Esportivas</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastre-se') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="ml-2 mr-2">
                                  <a href="{{ route('carrinho') }}" class="btn btn-light bi-cart pr-2">
                                  Carrinho
                                  @if (session()->has('carrinho'))
                                  <span class="badge bg-danger">{{ count(session('carrinho')) }}</span>
                                  @endif
                                  </a>
                                </div>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('lista_ecommerce')}}">E-commerce</a>
                                    <a class="dropdown-item" href="{{ route('endereco_lista') }}">Endereços</a>

                                    @if ($admin ?? false)
                                        <a class="dropdown-item" href="{{ route('cidade_lista') }}">Cidades</a>
                                        <a class="dropdown-item" href="{{ route('tamanho_lista') }}">Tamanhos</a>
                                        <a class="dropdown-item" href="{{ route('categoria_lista') }}">Categorias</a>
                                        <a class="dropdown-item" href="{{ route('produto_lista') }}">Produtos</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                
                                 
                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
            <div class="row justify-content-center mt-5">
                @if (session('mensagem'))
                <div class="alert alert-success">
                  {{ session('mensagem') }}
                </div>
                @endif
                @yield('conteudo')
            </div>
      
    </div>
    
</body>
</html>



























