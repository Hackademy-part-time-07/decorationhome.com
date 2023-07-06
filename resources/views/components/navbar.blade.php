<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/" style="margin-top: -40px;">
      <img src="{{ asset('images/HOMEDECORATION.COM.png') }}" alt="Logo" width="250px" height="250px">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-item" style="list-style-type: none; display:flex; justify-content: space-around;">
        <li class="nav-item">
          <a class="nav-link" href="/">Inicio</a>
        </li>
        <li class="nav-item" style="margin-left: 10px;">
          <a class="nav-link" href="{{ route('ads') }}">Anuncios</a>
        </li>
      </ul>

      @auth
      <ul class="navbar-item">
        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.35rem; margin-bottom: -10px; text-decoration: none;">
            Colaborador
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('create') }}">Create Article</a></li>
          </ul>
        </li>
      </ul>
      @endauth

      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

      <ul class="navbar-item">
        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.35rem; margin-bottom: -10px; text-decoration: none;">
            Categorías
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'coches']) }}">coches</a></li>
            <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'motos']) }}">Motos</a></li>
            <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'hogar']) }}">Hogar</a></li>
            <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'electronica']) }}">Electrónica</a></li>
            <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'moviles']) }}">Móviles</a></li>
            <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'ordenadores']) }}">Ordenadores</a></li>
             </ul>
        </li>
      </ul>

      <ul class="navbar-item">
        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 1.35rem; margin-bottom: -10px; text-decoration: none;">
            Login
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @guest
            <li>
              <a class="dropdown-item" href="{{ route('login') }}">Entrar</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('register') }}">Registro</a>
            </li>
            @endguest
            <li>
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: 1rem; margin-bottom: -10px;">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
