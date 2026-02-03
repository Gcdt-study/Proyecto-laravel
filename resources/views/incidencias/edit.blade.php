<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Editar incidencia</h2>
    </x-slot>

    <div class="p-6">

        <form method="POST" action="{{ route('incidencias.update', $incidencia) }}">
            @csrf
            @method('PUT')

            <label class="block mt-2">Título</label>
            <input type="text" name="titulo" class="w-full border p-2"
                   value="{{ $incidencia->titulo }}" required>

            <label class="block mt-2">Descripción</label>
            <textarea name="descripcion" class="w-full border p-2" required>
                {{ $incidencia->descripcion }}
            </textarea>

            <label class="block mt-2">Aula</label>
            <select name="aula_id" class="w-full border p-2" required>
                @foreach ($aulas as $aula)
                    <option value="{{ $aula->id }}" @selected($aula->id == $incidencia->aula_id)>
                        {{ $aula->nombre }}
                    </option>
                @endforeach
            </select>

            <label class="block mt-2">Dispositivo</label>
            <select name="dispositivo_id" class="w-full border p-2" required>
                @foreach ($dispositivos as $dispositivo)
                    <option value="{{ $dispositivo->id }}" @selected($dispositivo->id == $incidencia->dispositivo_id)>
                        {{ $dispositivo->nombre }}
                    </option>
                @endforeach
            </select>

            @can('es_tde')
<form action="{{ route('incidencias.resolver', $incidencia) }}" method="POST" class="mt-4">
    @csrf
    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Marcar como resuelta y enviar correo
    </button>
</form>
@endcan


            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">
                Actualizar
            </button>
        </form>

    </div>
</x-app-layout>
