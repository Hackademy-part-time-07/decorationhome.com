<x-layout>
    <x-slot name='title'>DecorationHome - Homepage</x-slot>
    <h1>Bienvenido a DecorationHome.com</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
</x-layout>
