{{-- <header>
    <nav class="nav">
        <a class="img_nav" href="#">
            <img src="{{ asset('images/HOMEDECORATION.COM.png') }}" alt="Logo" >
          </a>
        <ol class="nav_ol">
            <li> <a href="{{ route('ads') }}">Anuncios</a></li>
            <li> 
                <div class="filterado_bottom">
                <select  class="selector" name="" id="ordenar">
                    <option value="Categorias" >Categorias</option>

                    <option value="Coches"href="{{ route('ads.category', ['category' => 'coches']) }}">Coches</option>

                    <option value="Motos" href="{{ route('ads.category', ['category' => 'motos']) }}">Motos</option>

                    <option value="Hogar"href="{{ route('ads.category', ['category' => 'hogar']) }}" >Hogar</option>

                    <option value="Electronica"href="{{ route('ads.category', ['category' => 'electronica']) }}" >Electronica</option>
                    <option value="Moviles"href="{{ route('ads.category', ['category' => 'moviles']) }}" >Moviles</option>

                    <option value="Ordenadores" href="{{ route('ads.category', ['category' => 'ordenadores']) }}">Ordenadores</option>
                </select>
                </div>
            </li>
            @auth
            <li><a href="{{ route('create') }}">Crear articulo</a></li>
            @endauth
            <li><div class="btn"><a href="#" id="text_btn">Crear Cuenta</a></div></li>
        </ol>
        <div class="dropdown">
            <button class="dropbtn">Login</button>
            @guest
            <div class="dropdown-content">
              <a href="{{ route('login') }}">Entrar</a>
              <a href="{{ route('register') }}">Registro</a>
            </div>
            @endguest
        </div>
        <li>
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-size: 1rem; margin-bottom: -10px;">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        <i id="luna" class="far fa-moon"></i>
    </nav>
</header>
 --}}

{{-- ESTE NO SE NECESITA COPIAR --}}