<x-layout>
    <h1>Detalle</h1>

            <div class="contenedor_position">
                <div class="card">


                    @if ($ad->image)
                    <img src="{{ asset('storage/images/' . $ad->image) }}" class="card-img-top" alt="Anuncio" height="600px" width="100%">
                @else
                    <img src="{{ asset('images/iphonese.jpg') }}
                    " class="card-img-top" alt="Imagen de relleno">
                @endif



                    <div class="card_body">
                        <h5>{{ $ad->title }}</h5>
                        <p> <b>{{ $ad->body }}</b></p>
                        <p>Precio: <b>${{ $ad->price }}</b></p>
                        <p>Categoría:
                            @if ($ad->category)
                                <a class="color_a" href="{{ route('ads.category', ['category' => $ad->category->name]) }}"> <b>{{ $ad->category->name }} </b></a>
                            @else
                                Sin categoría
                            @endif
                        </p>
                        <p>Fecha de creación: <b>{{ $ad->created_at }}</b></p>
                        <p>Usuario: <b>{{ $ad->user->name }}</b> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
