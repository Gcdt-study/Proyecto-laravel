<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        <!-- BOTONES CENTRADOS -->
        <div class="flex justify-center gap-4 mt-6 flex-wrap">

            <!-- Incidencias (todos) -->
            <a href="{{ route('incidencias.index') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition">
                Gestionar incidencias
            </a>

            <!-- Aulas (todos) -->
            <a href="{{ route('aulas.index') }}"
               class="bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700 transition">
                Aulas
            </a>

            <!-- Dispositivos (todos) -->
            <a href="{{ route('dispositivos.index') }}"
               class="bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700 transition">
                Dispositivos
            </a>

            <!-- Profesores (solo TDE) -->
            @if(auth()->user()->profesor->es_tde)
                <a href="{{ route('profesores.index') }}"
                   class="bg-green-600 text-white px-6 py-3 rounded-lg shadow hover:bg-green-700 transition">
                    Gestión de profesores
                </a>
            @endif

        </div>

    </div>
</x-app-layout>
