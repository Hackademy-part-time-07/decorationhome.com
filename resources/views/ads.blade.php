<x-layout>
    <x-slot name="title">
        {{ $categoryName ?? 'Lista de Anuncios' }}
    </x-slot>
    <div>
        @if(request()->is('/'))
            <h1>{{ $welcomeMessage ?? '' }}</h1>
        @endif

        @if(request()->is('ads'))
            <h1 style="margin-top:20px; ">{{ $categoryName ?? 'Todos los anuncios:' }}</h1>
        @endif

        <h1>{{ ucfirst($categoryName) }}</h1>


        <div>
            <div>
                <div class="contenedor_position">
                    @if($ads->isEmpty())
                    <p>No hay nada en está categoría puedes <a href="{{ route('create') }}">publicar</a> algo</p>
                        <p>o Volver al <a href="/">inicio</a> y comprar alguno de nuestro muchos productos de otra categoría.</p>
                    @else
                        <div class="card_columns">
                            @foreach($ads as $ad)
                                <div class="card">
                                    @if ($ad->image)
                                        <img src="{{ asset('storage/images/' . $ad->image) }}" class="card-img-top" alt="Anuncio" height="300px" width="100%">
                                    @else
                                        <img src="{{ asset('images/iphonese.jpg') }}" class="card-img-top" alt="Imagen de relleno">
                                    @endif
                                    <div class="card_body">
                                        <h5>{{ $ad->title }}</h5>
                                        <div>{{ $ad->body }}</div>
                                        <p>Precio: <b>${{ $ad->price }} </b></p>
                                        <p>Categoría: <a class="color_a" href="{{ route('ads.category', ['category' => $ad->category->name]) }}"> <b>{{ optional($ad->category)->name }}</b> </a></p>
                                        <p>Data: <b>{{ $ad->created_at }}</b></p>
                                        <p>Usuario: <b>{{ optional($ad->user)->name }} </b> </p>
                                        <button class="btn_card" type="summit"><a class="position_card" href="{{ route('ad.show', ['id' => $ad->id]) }}"> Ver detalles </a> </button>
                                        
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
