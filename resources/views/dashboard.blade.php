<x-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

        <form action="{{ route('dashboard') }}" method="GET" class="mb-4">
            <div class="flex">
                <input type="text" name="search" placeholder="Buscar por nombre de usuario" class="mr-2 px-2 py-1 border border-gray-300 rounded">
                <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Buscar</button>
            </div>
        </form>

        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Revisor</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    
                    <td class="px-4 py-2">
                        <input type="checkbox" name="is_revisor" value="1" {{ $user->is_revisor ? 'checked' : '' }}>
                    </td>
                    <td class="px-4 py-2">
                        <form action="{{ route('dashboard.updateRole', $user->id) }}" method="POST">
                            @csrf
                            <div>
                                <label for="is_revisor" class="mr-2">Revisor:</label>
                                <input type="checkbox" name="is_revisor" value="1" {{ $user->is_revisor ? 'checked' : '' }}>
                            </div>
                            <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                                Actualizar Roles
                            </button>
                        </form>
                        <form action="{{ route('dashboard.updateRole', $user->id) }}" method="POST" class="inline">

                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar Usuario</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
