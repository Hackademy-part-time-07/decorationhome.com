<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid">
    <a href="/" style="margin-top: -40px; margin-left:0;">
      <img src="{{ asset('images/HOMEDECORATION.COM.png') }}" alt="Logo" style="margin-bottom:-60px" width="250px" height="250px">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse  nav_ul" id="navbarNav">
      <ul class="nav_ul">
        <li>
          <a class="nav-link" href="/">Inicio</a>
        </li>
        <li>
          <a class="nav-link" style="padding-left: 6rem;" href="{{ route('ads') }}">Anuncios</a>
        </li>
      </ul>


    <ul class="nav_ul"">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categorías
              </a>
              <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'coches']) }}">coches</a></li>
                <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'motos']) }}">Motos</a></li>
                <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'hogar']) }}">Hogar</a></li>
                <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'electronica']) }}">Electrónica</a></li>
                <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'moviles']) }}">Móviles</a></li>
                <li><a class="dropdown-item" href="{{ route('ads.category', ['category' => 'ordenadores']) }}">Ordenadores</a></li>
                </ul>
            </li>
          </ul>
 
      
      @auth
      <ul class="nav_ul ">
        <li class="nav-item dropdown" style="list-style-type: none;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Colaborador
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a href="{{ route('create') }}">Crear articulo</a></li>
          </ul>
        </li>
      </ul>
      @endauth

      <ul class="nav_ul">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
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
          </ul>
 
        </li>
      
        <ul class="nav_ul">
            <li>
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: 1.5rem; padding-left: 3rem;">Logout</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
        </ul>


      </ul>
    </div>
  </div>
</nav>
