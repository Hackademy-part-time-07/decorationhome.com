<x-layout>
    <x-slot name="title">
        {{ $categoryName ?? 'Lista de Anuncios' }}
    </x-slot>
    <div class="container">
        @if(request()->is('/'))
            <h1>{{ $welcomeMessage ?? '' }}</h1>
        @endif

        @if(request()->is('ads'))
            <h1>{{ $categoryName ?? 'Todos los anuncios:' }}</h1>
        @endif

        <h1>{{ $categoryName }}</h1>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if($ads->isEmpty())
                    <p>No hay nada en está categoría puedes <a href="{{ route('create') }}">publicar</a> algo</p>
                        <p>o Volver al <a href="/">inicio</a> y comprar alguno de nuestro muchos productos de otras categorias</p>
                    @else
                        <div class="card-columns">
                            @foreach($ads as $ad)
                                <div class="card">
                                    @if ($ad->image)
                                        <img src="{{ asset('storage/images/' . $ad->image) }}" class="card-img-top" alt="Anuncio" height="600px" width="100%">
                                    @else
                                        <img src="{{ asset('images/birras.jpeg') }}" class="card-img-top" alt="Imagen de relleno">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $ad->title }}</h5>
                                        <p class="card-text">{{ $ad->body }}</p>
                                        <p class="card-text">Precio: ${{ $ad->price }}</p>
                                        <p class="card-text">Categoría: <a href="{{ route('ads.category', ['category' => $ad->category->name]) }}">{{ optional($ad->category)->name }}</a></p>
                                        <p class="card-text">Fecha de creación: {{ $ad->created_at }}</p>
                                        <p class="card-text">Usuario: {{ optional($ad->user)->name }}</p>
                                        <a href="{{ route('ad.show', ['id' => $ad->id]) }}" class="btn btn-primary">Ver detalles</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (request()->is('/'))
        <!-- No mostrar el paginador -->
    @else
        <div class="d-flex justify-content-center">
            {{ $ads->links('pagination::bootstrap-4') }}
        </div>
    @endif
</x-layout>
