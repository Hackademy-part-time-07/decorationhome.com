<x-layout>
    <x-slot name="title">
        {{ $categoryName ?? 'Lista de Anuncios' }}
    </x-slot>
    @if(session('success'))
        <div class="alert alert-success" style="padding-top: 60px;">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        @if(request()->is('/'))
            <h1 class="pt-5" style="margin-bottom: -25px;">{{__('messages.welcome')}}</h1>;
            
        @endif
        @if(request()->is('ads'))
            <h1 style="margin-top: 60px; margin-bottom: -30px;">{{ $categoryName ?? 'Todos los anuncios:' }}</h1>
        @endif
        <h1 style="margin-top: 60px; margin-bottom: 10px;">{{ ucfirst($categoryName) }}</h1>

        <div class="card-columns">
            @forelse($ads as $ad)
                <div class="card">
                    @if ($ad->image)
                        <img src="{{ asset('storage/images/' . $ad->image) }}" class="card-img-top" alt="Anuncio">
                    @else
                        <img src="{{ asset('images/iphonese.jpg') }}" class="card-img-top" alt="Imagen de relleno">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $ad->title }}</h5>
                        <div class="card-text scrollable">{{ $ad->body }}</div>
                        <p class="card-text">Precio: ${{ $ad->price }}</p>
                        <p class="card-text">Categoría: <a href="{{ route('ads.category', ['category' => $ad->category->name]) }}">{{ optional($ad->category)->name }}</a></p>
                        <p class="card-text">Fecha de creación: {{ $ad->created_at }}</p>
                        <p class="card-text">Usuario: {{ optional($ad->user)->name }}</p>
                        <a href="{{ route('ad.show', ['id' => $ad->id]) }}" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <p>No hay nada en esta categoría, puedes <a href="{{ route('create') }}">publicar</a> algo</p>
                    <p>O vuelve al <a href="/">inicio</a> y compra alguno de nuestros muchos productos de otra categoría.</p>
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
        
        
</x-layout>
