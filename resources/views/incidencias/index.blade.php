<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mis incidencias
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('incidencias.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                Nueva incidencia
            </a>

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">Título</th>
                            <th class="py-2">Aula</th>
                            <th class="py-2">Dispositivo</th>
                            <th class="py-2">Estado</th>
                            <th class="py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incidencias as $incidencia)
                            <tr class="border-b">
                                <td class="py-2">{{ $incidencia->titulo }}</td>
                                <td class="py-2">{{ $incidencia->aula->nombre }}</td>
                                <td class="py-2">{{ $incidencia->dispositivo->nombre }}</td>
                                <td class="py-2">{{ $incidencia->estado }}</td>

                                <td class="py-2 flex gap-3">

                                    {{-- BOTÓN VER (TDE o creador) --}}
                                    @if(auth()->user()->profesor->es_tde || auth()->id() === $incidencia->user_id)
                                        <a href="{{ route('incidencias.show', $incidencia) }}"
                                           class="text-green-600 hover:underline">
                                            Ver
                                        </a>
                                    @endif

                                    {{-- BOTÓN EDITAR (solo creador) --}}
                                    @if(auth()->id() === $incidencia->user_id)
                                        <a href="{{ route('incidencias.edit', $incidencia) }}"
                                           class="text-blue-600 hover:underline">
                                            Editar
                                        </a>
                                    @endif

                                    {{-- BOTÓN ELIMINAR (solo creador) --}}
                                    @if(auth()->id() === $incidencia->user_id)
                                        <form action="{{ route('incidencias.destroy', $incidencia) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Seguro que quieres eliminarla?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:underline">Eliminar</button>
                                        </form>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
