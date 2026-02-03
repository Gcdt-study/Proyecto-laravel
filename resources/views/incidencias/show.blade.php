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

            {{-- SOLO PARA TDE Y SOLO SI ESTÁ PENDIENTE --}}
            @if(auth()->user()->profesor->es_tde && $incidencia->estado === 'pendiente')
                <form action="{{ route('incidencias.resolver', $incidencia) }}" method="POST" class="mt-6">
                    @csrf

                    <label class="block mb-2 font-semibold">Comentario de resolución:</label>
                    <textarea name="comentario_resolucion" class="w-full border p-2 rounded" required></textarea>

                    <button class="mt-3 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Resolver incidencia y enviar correo
                    </button>
                </form>
            @endif

            {{-- MOSTRAR RESOLUCIÓN SI YA ESTÁ RESUELTA --}}
            @if($incidencia->estado === 'resuelta')
                <div class="mt-6 p-4 bg-green-100 border border-green-300 rounded">
                    <p><strong>Comentario de resolución:</strong> {{ $incidencia->comentario_resolucion }}</p>
                    <p><strong>Fecha de resolución:</strong> {{ $incidencia->fecha_resolucion }}</p>
                </div>
            @endif

        </div>
    </div>
    
</x-app-layout>


