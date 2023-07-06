<x-layout>

    <x-slot name="title">Lista de Anuncios</x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Anuncios Publicados
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach($ads as $ad)
                                <div class="list-group-item">
                                    <h5 class="card-title">{{ $ad->title }}</h5>
                                    <p class="card-text">{{ $ad->body }}</p>
                                    <p class="card-text">Precio: ${{ $ad->price }}</p>
                                    <p class="card-text">Categoría: <a href="{{ route('ads.category', ['category' => $ad->category_id]) }}">{{ optional($ad->category)->name }}</a></p>
                                    <p class="card-text">Fecha de creación: {{ $ad->created_at }}</p>
                                    <p class="card-text">Usuario: {{ optional($ad->user)->name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
