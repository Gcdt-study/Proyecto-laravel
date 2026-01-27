<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva incidencia
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow-sm sm:rounded-lg">

            <form method="POST" action="{{ route('incidencias.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium">Título</label>
                    <input type="text" name="titulo" class="w-full border rounded p-2"
                           value="{{ old('titulo') }}" required>
                    @error('titulo') <p class="text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Descripción</label>
                    <textarea name="descripcion" class="w-full border rounded p-2" required>{{ old('descripcion') }}</textarea>
                    @error('descripcion') <p class="text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Aula</label>
                    <select name="aula_id" class="w-full border rounded p-2" required>
                        <option value="">Selecciona un aula</option>
                        @foreach ($aulas as $aula)
                            <option value="{{ $aula->id }}">{{ $aula->nombre }}</option>
                        @endforeach
                    </select>
                    @error('aula_id') <p class="text-red-600">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium">Dispositivo</label>
                    <select name="dispositivo_id" class="w-full border rounded p-2" required>
                        <option value="">Selecciona un dispositivo</option>
                        @foreach ($dispositivos as $dispositivo)
                            <option value="{{ $dispositivo->id }}">{{ $dispositivo->nombre }}</option>
                        @endforeach
                    </select>
                    @error('dispositivo_id') <p class="text-red-600">{{ $message }}</p> @enderror
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Guardar
                </button>
            </form>

        </div>
    </div>
</x-app-layout>
