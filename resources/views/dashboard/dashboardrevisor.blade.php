<x-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <h1>Dashboard</h1>

        <div class="row">
            @foreach ($ads as $ad)
                <div class="col-md-6">
                    <div class="card">
                        <!-- Resto del código del anuncio -->
        
                        <div class="card-body">
        
                            <!-- Formulario para editar los datos del anuncio -->
                            <form action="{{ route('dashboardrevisor.update', ['id' => $ad->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image">Imagen</label>
                                    @if ($ad->image)
                                        <img src="{{ asset('storage/images/' . $ad->image) }}" alt="Imagen actual" height="100">
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
        
                            <!-- Formulario para eliminar el anuncio -->
                            <form action="{{ route('dashboardrevisor.destroyAd', ['id' => $ad->id]) }}" method="POST" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar anuncio</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

