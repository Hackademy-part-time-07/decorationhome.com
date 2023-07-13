<header class="main-header">
    <label for="btn-nav" class="btn-nav"><i class="fas fa-bars"></i></label>
    <input type="checkbox" id="btn-nav">
    
    <nav>
        <ul class="navigation">
            <li><a class="nav-link" style="margin-right:50px; color:black;" href="/">{{ __('Inicio') }}</a></li>
            <li><a class="nav-link" style="color:black;" href="{{ route('ads') }}">{{ __('Anuncios') }}</a></li>
            @auth 
            <li class="nav-item">
                <a class="nav-link" href="{{ route('request.reviewer') }}" style="margin-right: 40px;color: black; ">{{ __('Empleo') }}</a>
            </li>
            @endauth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Categorías') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCategories">
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'coches']) }}">{{ __('Coches') }}</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'motos']) }}">{{ __('Motos') }}</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'hogar']) }}">{{ __('Hogar') }}</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'electronica']) }}">{{ __('Electrónica') }}</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'moviles']) }}">{{ __('Móviles') }}</a>
                    <a class="dropdown-item" href="{{ route('ads.category', ['category' => 'ordenadores']) }}">{{ __('Ordenadores') }}</a>
                </div>
            </li>
            @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbarDropdownCollaborator" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Colaborador') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownCollaborator">
                    <a class="dropdown-item" href="{{ route('create') }}">{{ __('Crear Anuncio') }}</a>
                    @if (auth()->user()->is_admin == 1)
                        <a class="dropdown-item" href="{{ route('dashboard') }}">{{ __('Administrador') }}</a>
                    @endif
                    @if (auth()->user()->is_revisor == 1)
                        <a class="dropdown-item" href="{{ route('dashboardrevisor') }}">{{ __('Revisor') }}</a>
                    @endif
                </div>
            </li>
            @endauth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color:black;" href="#" id="navbarDropdownLogin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('Login') }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownLogin">
                    @guest
                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Registro') }}</a>
                    @endguest
                    @auth
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endauth
                </div>
            </li>
            @if (Auth::check() && Auth::user()->is_revisor)
                @php
                    $pendingAdsCount = \App\Models\Ad::where('is_accepted', 0)->orWhereNull('is_accepted')->count();
                @endphp
                @if ($pendingAdsCount > 0)
                    <li class="nav-item" style="margin-left: 15px;">
                        <a class="nav-link" href="{{ route('dashboardrevisor') }}">
                            <i class="fas fa-envelope"></i>
                            <span class="badge bg-danger">{{ $pendingAdsCount }} {{ __('Anuncios') }}</span>
                        </a>
                    </li>
                @endif
            @endif
            <li class="logo-container">
                <a href="/" class="logo-link">
                    <img src="{{ asset('images/homedecoration.com.png') }}" alt="Logo" width="250" height="250">
                </a>
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
