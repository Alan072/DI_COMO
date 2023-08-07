@extends('plantilla')
@section('contenido')

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Pasillo
                </th>
                <th scope="col" class="px-6 py-3">
                    Racks
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($producto as $item)
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->id_ubicacion}}

                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->pasillo}}
                </th>
                <td class="px-6 py-4">
                    {{$item->racks}}
                </td>
                
                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="{{ route('editar_ubicacion', $item->id_ubicacion) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    <form id="eliminar-ubicacion" action="{{ route('eliminar_producto', ['id_ubicacion' => $item->id_ubicacion]) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmarEliminacion()" class="text-red-600">Eliminar</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    function confirmarEliminacion() {
        if (confirm('¿Está seguro de que desea eliminar este producto?')) {
            document.getElementById('eliminar-ubicacion').submit();
        }
    }
</script>

@stop