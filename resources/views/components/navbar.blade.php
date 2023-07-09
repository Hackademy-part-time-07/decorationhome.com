<nav class="navbar navbar-expand-lg" style="padding-left: 15px; padding-right: 15px; margin-bottom: 3.5rem;">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('images/HOMEDECORATION.COM.png') }}" alt="Logo" width="250px" height="220px">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" style="margin-right:50px;" href="/">Inicio</a>
        </li>
        <li class="nav-item" style="margin-right: 40px; ">
          <a class="nav-link" href="{{ route('ads') }}">Anuncios</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
      </ul>

      <form class="search form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>

      <ul class="navbar-nav">
        @auth
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownCollaborator" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Colaborador
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownCollaborator">
            <a class="dropdown-item" href="{{ route('create') }}">Create Article</a>
            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>

          </div>
        </li>
        @endauth

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLogin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
