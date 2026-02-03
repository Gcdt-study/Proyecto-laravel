<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Gestión de Profesores</h2>
    </x-slot>

    <div class="p-6">

        <a href="{{ route('profesores.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Nuevo Profesor
        </a>

        <table class="w-full mt-4 border">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="p-2">Usuario</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Apellido</th>
                    <th class="p-2">TDE</th>
                    <th class="p-2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($profesores as $profesor)
                    <tr class="border-b">
                        <td class="p-2">{{ $profesor->user->email }}</td>
                        <td class="p-2">{{ $profesor->nombre }}</td>
                        <td class="p-2">{{ $profesor->apellido }}</td>
                        <td class="p-2">{{ $profesor->es_tde ? 'Sí' : 'No' }}</td>

                        <td class="p-2 flex gap-2">
                            <a href="{{ route('profesores.edit', $profesor) }}"
                               class="text-blue-600">Editar</a>

                            <form action="{{ route('profesores.destroy', $profesor) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Eliminar profesor?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>