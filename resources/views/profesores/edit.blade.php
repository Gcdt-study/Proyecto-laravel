<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Editar Profesor</h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('profesores.update', $profesor) }}" method="POST">
            @csrf
            @method('PUT')

            <label class="block mt-2">Usuario asociado</label>
            <input type="text" class="w-full border p-2 bg-gray-100"
                   value="{{ $profesor->user->email }}" disabled>

            <label class="block mt-2">Nombre</label>
            <input type="text" name="nombre" class="w-full border p-2"
                   value="{{ $profesor->nombre }}" required>

            <label class="block mt-2">Apellido</label>
            <input type="text" name="apellido" class="w-full border p-2"
                   value="{{ $profesor->apellido }}" required>

            <label class="flex items-center mt-3">
                <input type="checkbox" name="es_tde" value="1"
                       class="mr-2" @checked($profesor->es_tde)>
                Es TDE
            </label>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>
        </form>

    </div>
</x-app-layout>
