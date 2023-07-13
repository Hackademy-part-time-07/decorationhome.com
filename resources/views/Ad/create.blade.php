<x-layout>
    <x-slot name="title">homedecoration - Vendo algo interesante</x-slot>
    <div class="container" style="margin-top: 70px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card1" style="background-color: #cbf0e4; padding: 15px; margin-bottom: 20px;">
                    <div class="card-header">
                       <b> <h2>{{ __('Nuevo Anuncio') }}</h2> </b>
                    </div>
                    <form action="{{ route('ad.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="form-group" style="margin-top: 10px;">
                            <label for="image">Imagen:</label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
