<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar incidencia
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">

            <form method="POST" action="{{ route('incidencias.update', $incidencia) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium">Título</label>
                    <input type="text" name="titulo" class="w-full border rounded p-2"
                           value="{{ old('titulo', $incidencia->titulo) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Descripción</label>
                    <textarea name="descripcion" class="w-full border rounded p-2" required>{{ old('descripcion', $incidencia->descripcion) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Aula</label>
                    <select name="aula_id" class="w-full border rounded p-2" required>
                        @foreach ($aulas as $aula)
                            <option value="{{ $aula->id }}" @selected($aula->id == $incidencia->aula_id)>
                                {{ $aula->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Dispositivo</label>
                    <select name="dispositivo_id" class="w-full border rounded p-2" required>
                        @foreach ($dispositivos as $dispositivo)
                            <option value="{{ $dispositivo->id }}" @selected($dispositivo->id == $incidencia->dispositivo_id)>
                                {{ $dispositivo->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Actualizar
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
