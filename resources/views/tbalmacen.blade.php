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
                        Nombre del Almacen
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha y Hora de Creacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha y Hora de Actualizacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($almacen as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->id_almacen }}

                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nombre_almacen }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->created_at }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->updated_at }}
                        </td>

                        <td class="flex items-center px-6 py-4 space-x-3">
                            <a href="{{ route('editar_almacen', $item->id_almacen) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <form id="eliminar-producto"
                                action="{{ route('eliminar_almacen', ['id_almacen' => $item->id_almacen]) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="confirmarEliminacion()"
                                    class="text-red-600">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center">
            {!! $almacen->links() !!}
        </div>
    </div>
    <script>
        function confirmarEliminacion() {
            if (confirm('¿Está seguro de que desea eliminar este almacen?')) {
                document.getElementById('eliminar-producto').submit();
            }
        }
    </script>
    <div class="my-12">
        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-4"
            href="/almacen_admin">
            Regresar
        </a>
    </div>
@stop
