<x-layout>
    <x-slot name="title">
        {{ $categoryName ?? 'Lista de Anuncios' }}
    </x-slot>
    <div class="body_anuncios">
        @if(request()->is('/'))
            <h1>{{ $welcomeMessage ?? '' }}</h1>
        @endif

        @if(request()->is('ads'))
            <h1 style="margin-top:20px; ">{{ $categoryName ?? 'Todos los anuncios:' }}</h1>
        @endif



        
                <div class="contenedor_position">
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
                                        <p>Precio: <b>${{ $ad->price }} </b></p>
                                        <p>Categoría: <a class="color_a" href="{{ route('ads.category', ['category' => $ad->category->name]) }}"> <b>{{ optional($ad->category)->name }}</b> </a></p>
                                        <button type="summit"><a class="position_card" href="{{ route('ad.show', ['id' => $ad->id]) }}"> Ver detalles </a> </button>
                                        
                                    </div>
                                </div>
                            @endforeach
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
