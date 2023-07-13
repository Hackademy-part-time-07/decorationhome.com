<x-layout>
    <x-slot name="title">
        {{ $categoryName ?? __('Lista de Anuncios') }}
    </x-slot>
    @if(session('success'))
        <div class="alert alert-success" style="padding-top: 60px;">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        @if(request()->is('/'))
            <h1 class="pt-5" style="margin-bottom: -25px;">{{ __('Bienvenido a HomeDecoration') }}</h1>
            <h1 class="pt-5" style="margin-bottom: -25px; color: yellow;">{{ __('Aquí podéis ver nuestros últimos avisos, para ver más ve a una categoría') }}</h1>
        @endif
        @if(request()->is('ads'))
            <h1 style="margin-top: 60px; margin-bottom: -30px;">{{ $categoryName ?? __('Todos los anuncios:') }}</h1>
        @endif
        <h1 style="margin-top: 60px; margin-bottom: 10px;">{{ ucfirst($categoryName) }}</h1>

        <div class="card-columns">
            @forelse($ads as $ad)
                <div class="card">
                    @if ($ad->image)
                        <img src="{{ asset('storage/images/' . $ad->image) }}" alt="{{ __('Imagen del anuncio') }}" class="card-img-top">
                    @else
                        <img src="{{ asset('images/iphonese.jpg') }}" class="card-img-top" alt="{{ __('Imagen de relleno') }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <div class="card-text scrollable">{{ $ad->body }}</div>
                        <p class="card-text">{{ __('Precio') }}: ${{ $ad->price }}</p>
                        <p class="card-text">{{ __('Categoría') }}: <a href="{{ route('ads.category', ['category' => $ad->category->name]) }}">{{ optional($ad->category)->name }}</a></p>
                        <p class="card-text">{{ __('Fecha de creación') }}: {{ $ad->created_at }}</p>
                        <p class="card-text">{{ __('Usuario') }}: {{ optional($ad->user)->name }}</p>
                        <a href="{{ route('ad.show', ['id' => $ad->id]) }}" class="btn btn-primary">{{ __('Ver detalles') }}</a>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>{{ __('No hay nada en esta categoría, puedes') }} <a href="{{ route('create') }}">{{ __('publicar') }}</a> {{ __('algo') }}</p>
                    <p>{{ __('O vuelve al') }} <a href="/">{{ __('inicio') }}</a> {{ __('y compra alguno de nuestros muchos productos de otra categoría.') }}</p>
                </div>
            @endforelse
        </div>
        <div class="pagination-wrapper">
            <div class="pagination">
                @unless(request()->is('/'))
                    {{ $ads->links('pagination::bootstrap-5') }}
                @endunless
            </div>
        </div>
    </div>



    <div class="canvas-container">
        <canvas class="connecting-dots"></canvas>
    </div>

    <script>
        var canvasDots = function() {
            var canvas = document.querySelector('canvas');
            var ctx = canvas.getContext('2d');
            var colorDot = '#CECECE';
            var color = '#CECECE';
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            canvas.style.display = 'block';
            ctx.fillStyle = colorDot;
            ctx.lineWidth = 0.1;
            ctx.strokeStyle = color;

            var mousePosition = {
                x: 30 * (canvas.width / 100),
                y: 30 * (canvas.height / 100)
            };

            var dots = {
                nb: 600,
                distance: 60,
                d_radius: 100,
                array: []
            };

            function Dot() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height;
                this.vx = -0.5 + Math.random();
                this.vy = -0.5 + Math.random();
                this.radius = Math.random();
            }

            Dot.prototype = {
                create: function() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2, false);
                    ctx.fill();
                },

                animate: function() {
                    for (var i = 0; i < dots.nb; i++) {
                        var dot = dots.array[i];

                        if (dot.y < 0 || dot.y > canvas.height) {
                            dot.vx = dot.vx;
                            dot.vy = -dot.vy;
                        } else if (dot.x < 0 || dot.x > canvas.width) {
                            dot.vx = -dot.vx;
                            dot.vy = dot.vy;
                        }
                        dot.x += dot.vx;
                        dot.y += dot.vy;
                    }
                },

                line: function() {
                    for (var i = 0; i < dots.nb; i++) {
                        for (var j = 0; j < dots.nb; j++) {
                            var i_dot = dots.array[i];
                            var j_dot = dots.array[j];

                            if (
                                i_dot.x - j_dot.x < dots.distance &&
                                i_dot.y - j_dot.y < dots.distance &&
                                i_dot.x - j_dot.x > -dots.distance &&
                                i_dot.y - j_dot.y > -dots.distance
                            ) {
                                if (
                                    i_dot.x - mousePosition.x < dots.d_radius &&
                                    i_dot.y - mousePosition.y < dots.d_radius &&
                                    i_dot.x - mousePosition.x > -dots.d_radius &&
                                    i_dot.y - mousePosition.y > -dots.d_radius
                                ) {
                                    ctx.beginPath();
                                    ctx.moveTo(i_dot.x, i_dot.y);
                                    ctx.lineTo(j_dot.x, j_dot.y);
                                    ctx.stroke();
                                    ctx.closePath();
                                }
                            }
                        }
                    }
                }
            };

            function createDots() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                for (var i = 0; i < dots.nb; i++) {
                    dots.array.push(new Dot());
                    var dot = dots.array[i];
                    dot.create();
                }
                dot.line();
                dot.animate();
            }

            window.onmousemove = function(parameter) {
                mousePosition.x = parameter.pageX;
                mousePosition.y = parameter.pageY;
            };

            mousePosition.x = window.innerWidth / 2;
            mousePosition.y = window.innerHeight / 2;

            setInterval(createDots, 1000 / 30);
        };

        window.onload = function() {
            canvasDots();
        };
    </script>
</x-layout>