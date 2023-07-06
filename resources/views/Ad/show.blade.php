<x-layout>
<h1>Detalle</h1>



    <div class="list-group-item">
        <h5 class="card-title">{{ $ad->title }}</h5>
        <p class="card-text">{{ $ad->body }}</p>
        <p class="card-text">Precio: ${{ $ad->price }}</p>
        <p class="card-text">Categoría:
            @if ($ad->category)
                <a href="{{ route('ads.category', ['category' => $ad->category->name]) }}">{{ $ad->category->name }}</a>
            @else
                Sin categoría
            @endif
        </p>
        <p class="card-text">Fecha de creación: {{ $ad->created_at }}</p>
        <p class="card-text">Usuario: {{ $ad->user->name }}</p>
    </div>
   

   
</x-layout>
