<x-layout>
    <x-slot name="title">
        Register
    </x-slot>

    <h1 class="padingtop20">Register</h1>

    <form method="POST" action="{{ route('register') }}" class="card mx-auto" style="height: 400px; width: 500px;">
        @csrf

        <div class="d-flex flex-column my-2">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required autofocus>
        </div>

        <div class="d-flex flex-column my-2">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="d-flex flex-column my-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="d-flex flex-column my-2">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <div class="d-flex justify-content-center my-2">
            <button type="submit">Register</button>
        </div>
    </form>
</x-layout>
