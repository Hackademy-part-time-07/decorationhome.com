<x-layout>
    <h1>Solicitud de Revisor</h1>
    <p>Nombre: {{ Auth::user()->name }}</p>
    <p>Correo electrónico: {{ Auth::user()->email }}</p>
    
    <form action="{{ route('request.reviewer') }}" method="POST">
        @csrf
        <div>
            <label for="message">Mensaje</label>
            <textarea name="message" id="message" rows="4" cols="50"></textarea>
        </div>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <button type="submit">Enviar solicitud</button>
    </form>
</x-layout>



