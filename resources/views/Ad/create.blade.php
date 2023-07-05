<x-layout>
    <x-slot name='title'>homedecoration - Vendo algo interesante</x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Nuevo Anuncio
                    </div>
                    <form action="{{ route('ad.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Título:</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Cuerpo:</label>
                            <textarea name="body" id="body" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Precio:</label>
                            <input type="number" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="category">Categoría:</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
