<nav class="navbar navbar-expand-none navbar-light " style="padding-left: 15px; padding-right: 15px; margin-bottom: 3.5rem;">
  <button style="margin-top: -40px; background-color:rgb(247, 247, 7);" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-column">
          <li class="nav-item">
              <a class="nav-link" style="margin-right:50px; color:white;" href="/">Inicio</a>
          </li>
          <li class="nav-item" style="margin-right: 40px; ">
              <a class="nav-link" style=" color:white;" href="{{ route('ads') }}">Anuncios</a>
          </li>

          @auth 
          <li class="nav-item">
              <a class="nav-link" href="{{ route('request.reviewer') }}" style="margin-right: 40px;color: white; ">Empleo</a>
          </li>
          @endauth
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdownCategories" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

          <form class="search form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>

          @auth
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color:white; href="#" id="navbarDropdownCollaborator" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Colaborador
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownCollaborator">
                  <a class="dropdown-item" href="{{ route('create') }}">Create Anuncio</a>
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
              <a class="nav-link dropdown-toggle" style="color:white; href="#" id="navbarDropdownLogin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
</nav>
