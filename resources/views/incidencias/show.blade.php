<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de incidencia
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">

            <p><strong>Título:</strong> {{ $incidencia->titulo }}</p>
            <p><strong>Descripción:</strong> {{ $incidencia->descripcion }}</p>
            <p><strong>Aula:</strong> {{ $incidencia->aula->nombre }}</p>
            <p><strong>Dispositivo:</strong> {{ $incidencia->dispositivo->nombre }}</p>
            <p><strong>Estado:</strong> {{ $incidencia->estado }}</p>

            <a href="{{ route('incidencias.index') }}" class="text-blue-600 mt-4 inline-block">
                Volver
            </a>

        </div>
    </div>
</x-app-layout>
