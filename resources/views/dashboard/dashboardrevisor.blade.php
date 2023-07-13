<x-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    @if(session('success'))
    <div class="alert alert-success" style="margin-top: 30px;">
        {{ session('success') }}
    </div>
    @endif

    @php
    $pendingAds = $ads->filter(function($ad) {
        return $ad->is_accepted === null || $ad->is_accepted === 0;
    });
    @endphp

    @if($pendingAds->count() > 0)
    <div class="alert alert-warning" style="margin-top: 40px;">
        Tienes {{ $pendingAds->count() }} anuncio(s) pendiente(s) por revisar.
    </div>
    @endif

    <div class="container padingtop20" style="margin-top: 30px;">
        <h1>Editar anuncios</h1>

        <div class="row">
            @foreach ($ads as $ad)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Anuncio #{{ $ad->id }}
                        </div>

                        <div class="card-body">
                            <p>Autor: {{ $ad->user->name }}</p>
                            <p>Email: {{ $ad->user->email }}</p>
                            <p>Fecha de creación: {{ $ad->created_at->format('d/m/Y H:i') }}</p>

                            <!-- Resto del código del anuncio -->

                            <form action="{{ route('dashboardrevisor.update', ['id' => $ad->id, 'filter' => request('filter')]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image">Imagen</label>
                                    @if ($ad->image)
                                        <img src="{{ asset('storage/images/' . $ad->image) }}" alt="Imagen actual" height="100">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image">
                                            <label class="form-check-label" for="delete_image">
                                                Eliminar imagen
                                            </label>
                                        </div>
                                    @endif
                                    <input type="file" name="image" class="form-control">
                                </div>

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

                                <div class="form-group">
                                    <label for="is_accepted">Aprobado</label>
                                    <select name="is_accepted" class="form-control">
                                        <option value="0" {{ $ad->is_accepted == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $ad->is_accepted == 1 ? 'selected' : '' }}>Sí</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </form>

                            <form action="{{ route('dashboardrevisor.destroyAd', ['id' => $ad->id, 'filter' => request('filter')]) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar anuncio</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <div class="mb-3">
                <label for="filter">Filtro:</label>
                <div class="btn-group" role="group">
                    <a href="{{ route('dashboardrevisor', ['filter' => 'all']) }}" class="btn btn-secondary {{ request('filter') === 'all' ? 'active' : '' }}">Todos los anuncios</a>
                    <a href="{{ route('dashboardrevisor', ['filter' => 'accepted']) }}" class="btn btn-secondary {{ request('filter') === 'accepted' ? 'active' : '' }}">Anuncios aceptados</a>
                    <a href="{{ route('dashboardrevisor', ['filter' => 'not_accepted']) }}" class="btn btn-secondary {{ request('filter') === 'not_accepted' ? 'active' : '' }}">Anuncios sin publicar</a>
                </div>
            </div>
            <div class="pagination-wrapper">
                <div class="pagination">
                    {{ $ads->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
