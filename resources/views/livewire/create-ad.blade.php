<h1>Crear Anuncio</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('ads.store') }}" method="POST">
    @csrf

    <div>
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
    </div>

    <div>
        <label for="body">Descripción:</label>
        <textarea name="body" id="body">{{ old('body') }}</textarea>
    </div>

    <div>
        <label for="price">Precio:</label>
        <input type="number" name="price" id="price" value="{{ old('price') }}">
    </div>

    <button type="submit">Guardar</button>
</form>