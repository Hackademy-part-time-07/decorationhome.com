<head>
  <title>{{ $title ?? 'homedecoration.com' }}</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
  <link href="{{ asset('css/globalstyles.css') }}" rel="stylesheet">
  <link href="{{ asset('css/cardAds.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

  
  <x-navbar />
  
  {{$slot}}
  <x-footer />

<script>
 Obtén la barra de navegación y los elementos de la navbar
const navbar = document.querySelector('.navbar');
const navbarElements = document.querySelectorAll('.navbar *:not(.navbar-toggler)');

// Escucha el evento mouseleave en la barra de navegación
navbar.addEventListener('mouseleave', function () {
  // Oculta todos los elementos de la navbar excepto el botón de alternancia y los dropdowns
  navbarElements.forEach(function (element) {
    if (!element.classList.contains('show')) {
      element.style.display = 'none';
    }
  });
});

// Escucha el evento mouseenter en la barra de navegación
navbar.addEventListener('mouseenter', function () {
  // Muestra todos los elementos de la navbar
  navbarElements.forEach(function (element) {
    element.style.display = 'block';
  });
});




  </script>


  
</body>
