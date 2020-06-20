<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script  src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/like.js') }}" defer></script>
    <script src="{{ asset('js/search.js') }}" defer></script>
    <script src="{{ asset('js/image-post.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-success shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <!-- TITULO DE LA APLICACION EN EL HEADER -->
                    <i class="fas fa-question "></i> <i class="fas fa-question mr-2"></i>GoInvolve.com
                    <!-- TITULO DE LA APLICACION EN EL HEADER -->
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
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        
                            <li class="nav-item">
                                <a class="nav-link text-white mx-2" href="{{ route('post.favorites') }}" id="btnSearch"> Buscar <i class="fas fa-search"></i></a>
                            </li>
                            
                           
                        
                            <li class="nav-item">
                                <a class="nav-link text-white mx-2" href="{{ route('post.favorites') }}"> Mis dudas <i class="fas fa-star"></i></a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link text-white mx-2" href="{{ route('post.upload') }}">Hacer pregunta <i class="fas fa-question"></i></a>
                            </li>
                        
                            <li class="nav-item">
                                <a class="nav-link text-white mx-2" href="{{ route('home') }}">Inicio <i class="fas fa-home"></i></a>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      
                                    
                                     <!-- Imagen de perfil -->
                                     @if(Auth::user()->image)
                                     <div class="image">
                                         <img src="{{ route('user.get-image', Auth::user()->image) }}" alt="">
                                     </div>
                                     @else
                                     <div class="image">
                                         <img src="{{ asset('img/default2.png') }}" alt="Imagen por defecto">
                                     </div>
                                     @endif
                                     <!-- Imagen de perfil -->
                                     
                                    
                                    
                                     <!-- Mi perfil -->
                                     <a class="dropdown-item d-flex justify-content-between" href="{{ route('user.profile', Auth::user()->id) }}">
                                                 <span>{{ __('Mi perfil') }} </span>  
                                                  <i class="fas fa-user"></i>
                                    </a>
                                    <!-- Mi perfil -->
                                    
                                    
                                     <!-- Mis datos -->
                                     <a class="dropdown-item d-flex justify-content-between" href="{{ route('user.config') }}">
                                                 <span>{{ __('Mis datos') }} </span>  
                                                  <i class="fas fa-cog"></i>
                                    </a>
                                    <!-- Mis datos -->
                                    
                                    
                                     <!-- Cerrar sesión -->
                                    <a class="dropdown-item d-flex justify-content-between " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                 <span>{{ __('Logout') }} </span>  
                                                  <i class="fas fa-sign-out-alt"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                     <!-- Cerrar sesión -->
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="search-section" id="searchSection">
            <form action="" class="search-form" id="formSearch" method="GET">
                <div class="group">
                    <textarea id="searchTextarea" placeholder="Search porblem"></textarea>
                    <button class="btn btn-light btn-sm" type="submit">Search <i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>