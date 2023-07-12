<x-layout>
    <x-slot name="title">homedecoration - Vendo algo interesante</x-slot>
    <header>
         <div>
            <div class="body_create">
                        <div class="texting_create">
                            <h2><b>Crea un nuevo Anuncio</b></h2>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolor, neque? Odit eum sed quia et repellat impedit. Quae voluptates amet architecto minima repellat, consequatur est corporis, numquam cum inventore aliquam! <b>Que estas esperando?</b></p>
                            <img src="https://ayvisa.es/wp-content/uploads/2021/03/imagenes-para-paginas-web.jpg" alt="img_create">
                        </div>
                    <form class="card_created" action="{{ route('ad.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="position_top">
                            <label for="title">Título:</label>
                            <input type="text" name="title" id="title" class="form-control">

                            <label for="body">Descripción:</label>
                            <textarea name="body" id="body" class="form-control"></textarea>
                        </div>
                        <div class="position_down">
                            <label for="price">Precio:</label>
                            <input type="number" name="price" id="price">
                        </div>
                        <div class="position_down">
                            <label for="category">Categoría:</label>
                            <select class="btn" name="category_id" id="category" >
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="position_down">
                            <label for="image">Imagen:</label>
                            <input class="btn" type="file" name="image" id="image">
                        </div>
                        <button class="btn">Guardar</button>
                    </form>
                </div>
            </div>
    </header>
           
</x-layout>
