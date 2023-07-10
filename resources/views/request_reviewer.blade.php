<x-layout>

    <p class="empleo padingtop20" style="margin-top: 30px;">¡Únete a nuestro equipo de revisores!</p>
    <p class="empleo ">Si te apasiona encontrar y revisar los mejores artículos de segunda mano, ¡te invitamos a convertirte en revisor en HomeDecoration! Como revisor, tendrás la oportunidad de garantizar la calidad y confiabilidad de los productos publicados en nuestra plataforma.</p>
    <p class="empleo ">Si estás interesado, por favor, completa el siguiente formulario de solicitud y estaremos encantados de considerarte para formar parte de nuestro equipo.</p>
    <div class="card1">
        <div class="card-body">
            <h1 class="card-title" style="margin-bottom: 20px;">Solicitud de Revisor</h1>
            <p>Nombre: {{ Auth::user()->name }}</p>
            <p>Correo electrónico: {{ Auth::user()->email }}</p>

            <form action="{{ route('request.reviewer') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="message">Mensaje</label>
                    <textarea name="message" id="message" rows="4" cols="50" class="form-control"></textarea>
                </div>
                @if(session('success'))
                    <p class="card-text">{{ session('success') }}</p>
                @endif
                <button type="submit" class="btn btn-primary">Enviar solicitud</button>
            </form>
        </div>
    
</x-layout>



