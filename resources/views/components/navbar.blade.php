<header class="main-header">
    <label for="btn-nav" class="btn-nav"><i class="fas fa-bars"></i></label>
    <input type="checkbox" id="btn-nav">
    
    <nav>
        <ul class="navigation">
            <li><a class="nav-link" style="margin-right:50px; color:black;" href="/">Inicio</a></li>
            <li><a class="nav-link" style="color:black;" href="{{ route('ads') }}">Anuncios</a></li>
            @auth 
            <li class="nav-item">
                <a class="nav-link" href="{{ route('request.reviewer') }}" style="margin-right: 40px;color: black; ">Empleo</a>
            </li>
            @endauth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorías
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'coches']) }}">Coches</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'motos']) }}">Motos</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'hogar']) }}">Hogar</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'electronica']) }}">Electrónica</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'moviles']) }}">Móviles</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'ordenadores']) }}">Ordenadores</a>
                </div>
            </li>
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbarDropdownCollaborator" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Colaborador
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCollaborator">
                    <a class="dropdown-item" href="{{ route('create') }}">Crear Anuncio</a>
                    @auth
                    @if (auth()->user()->is_admin == 1)
                    <a class="dropdown-item" href="{{ route('dashboard') }}">Administrador</a>
                    @endif
                    @if (auth()->user()->is_revisor == 1)
                    <a class="dropdown-item" href="{{ route('dashboardrevisor') }}">Revisor</a>
                    @endif
                    @endauth
                </div>
            </li>
            @endauth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbarDropdownLogin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownLogin">
                    @guest
                    <a class="dropdown-item" href="{{ route('login') }}">Entrar</a>
                    <a class="dropdown-item" href="{{ route('register') }}">Registro</a>
                    @endguest
                    @auth
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endauth
                   
                    <li class="logo-container">
                        <a href="/" class="logo-link">
                            <img src="{{ asset('images/homedecoration.com.png') }}" alt="Logo" width="250" height="250">
                        </a>
                    </li>
            </li>
        </ul>
      
        <ul style="display: flex;">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('locale.setLocale', 'es') }}" style="margin-right: 40px;color: black;" data-method="post">
                    <span class="flag-icon flag-icon-es"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('locale.setLocale', 'en') }}" style="margin-right: 40px;color: black;" data-method="post">
                    <span class="flag-icon flag-icon-gb"></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('locale.setLocale', 'it') }}" style="margin-right: 40px;color: black;" data-method="post">
                    <span class="flag-icon flag-icon-it"></span>
                </a>
            </li> 
        </ul>
        
        
        
    </nav>
    
</header>
