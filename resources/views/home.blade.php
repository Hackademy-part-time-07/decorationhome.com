<x-layout>
    <x-slot name='title'>HomeDecoration - Homepage</x-slot>
    <h1>Bienvenido a HomeDecoration.com</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</x-layout>
