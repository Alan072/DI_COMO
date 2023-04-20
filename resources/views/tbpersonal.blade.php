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
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellido Paterno
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellido Materno
                </th>
                <th scope="col" class="px-6 py-3">
                    Puesto
                </th>
                <th scope="col" class="px-6 py-3">
                    Telefono Celular
                </th>
                <th scope="col" class="px-6 py-3">
                    Correo
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Aciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tipo_usuario as $item)
                
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->id_usuario}}

                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->nombre}}
                </th>
                <td class="px-6 py-4">
                    {{$item->apellido_paterno}}
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->apellido_materno}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->nombre_rol}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->telefono_celular}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->correo}}
                </th>
                
                <td class="flex items-center px-6 py-4 space-x-3">
                    <a href="{{ route('editar_empleado', $item->id_usuario) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                    <form id="eliminar-producto" action="{{ route('eliminar_empleado', ['id_usuario' => $item->id_usuario]) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmarEliminacion()" class="text-red-600">Eliminar</button>
                    </form>
                </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-center">
        {!! $tipo_usuario->links() !!}
    </div>
</div>
<script>
    function confirmarEliminacion() {
        if (confirm('¿Está seguro de que desea eliminar este empleado?')) {
            document.getElementById('eliminar-producto').submit();
        }
    }
</script>

@stop