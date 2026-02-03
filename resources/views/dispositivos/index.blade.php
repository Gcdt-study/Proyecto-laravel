<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Listado de dispositivos</h2>
    </x-slot>

    <div class="p-6">
        <table class="w-full border">
            <tr class="bg-gray-200">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nombre</th>
                <th class="p-2 border">Aula</th>
            </tr>

            @foreach ($dispositivos as $dispositivo)
                <tr>
                    <td class="p-2 border">{{ $dispositivo->id }}</td>
                    <td class="p-2 border">{{ $dispositivo->nombre }}</td>
                    <td class="p-2 border">{{ $dispositivo->aula->nombre ?? 'Sin aula' }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
