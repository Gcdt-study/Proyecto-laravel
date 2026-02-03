<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Nuevo Profesor</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('register') }}"
           class="bg-green-600 text-white px-3 py-2 rounded">
            Crear nuevo usuario
        </a>

        <form action="{{ route('profesores.store') }}" method="POST" class="mt-4">
            @csrf

            <label class="block mt-2">Usuario asociado</label>
            <select name="user_id" class="w-full border p-2" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->email }}</option>
                @endforeach
            </select>

            <label class="block mt-2">Nombre</label>
            <input type="text" name="nombre" class="w-full border p-2" required>

            <label class="block mt-2">Apellido</label>
            <input type="text" name="apellido" class="w-full border p-2" required>

            <label class="flex items-center mt-3">
                <input type="checkbox" name="es_tde" value="1" class="mr-2">
                Es TDE
            </label>

            <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">
                Guardar
            </button>
        </form>
    </div>
</x-app-layout>
