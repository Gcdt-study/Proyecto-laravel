<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Listado de aulas</h2>
    </x-slot>

    <div class="p-6">
        <table class="w-full border">
            <tr class="bg-gray-200">
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nombre</th>
            </tr>

            @foreach ($aulas as $aula)
                <tr>
                    <td class="p-2 border">{{ $aula->id }}</td>
                    <td class="p-2 border">{{ $aula->nombre }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>
