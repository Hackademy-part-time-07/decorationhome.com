<x-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            @foreach ($ads as $ad)
                <div class="col-md-6">
                    <div class="card">
                        <!-- Resto del código del anuncio -->
        
                        <div class="card-body">
                            <h5 class="card-title">{{ $ad->title }}</h5>
                            <div class="card-text scrollable">{{ $ad->body }}</div>
                            <p class="card-text">Precio: ${{ $ad->price }}</p>
                            <p class="card-text">Categoría: <a href="{{ route('ads.category', ['category' => $ad->category->name]) }}">{{ optional($ad->category)->name }}</a></p>
                            <p class="card-text">Fecha de creación: {{ $ad->created_at }}</p>
                            <p class="card-text">Usuario: {{ optional($ad->user)->name }}</p>
                            <a href="{{ route('ad.show', ['id' => $ad->id]) }}" class="btn">Ver detalles</a>
        
                            <hr>
        
                            <!-- Formulario para editar los datos del anuncio -->
                            <form action="{{ route('dashboardrevisor.update', ['id' => $ad->id]) }}" method="POST">

                                @csrf
        
                                <div class="form-group">
                                    <label for="title">Título</label>
                                    <input type="text" name="title" value="{{ $ad->title }}" class="form-control">
                                </div>
        
                                <div class="form-group">
                                    <label for="body">Contenido</label>
                                    <textarea name="body" class="form-control">{{ $ad->body }}</textarea>
                                </div>
        
                                <div class="form-group">
                                    <label for="price">Precio</label>
                                    <input type="number" name="price" value="{{ $ad->price }}" class="form-control">
                                </div>
        
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</x-layout>
