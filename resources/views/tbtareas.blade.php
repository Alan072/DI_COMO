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
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NO. Salida
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Encargado de la Tarea
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ubicacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No. Entrada
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tarea as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->id_tarea }}

                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->descripcion }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->salida_id ? $item->salida_id : '' }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nombre }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Pasillo: {{ $item->pasillo }}
                            Rack: {{ $item->racks }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->entrada_id ? $item->entrada_id : '' }}
                        </td>

                        <td class="flex items-center px-6 py-4 space-x-3">
                            <a href="{{ route('editar_tarea', $item->id_tarea) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <form id="eliminar_hw_form_{{ $item->id_tarea }}"
                                action="{{ route('eliminar_tarea', ['id_tarea' => $item->id_tarea]) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    onclick="confirmarEliminacion('eliminar_hw_form_{{ $item->id_tarea }}')"
                                    class="text-red-600">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center">
            {!! $tarea->links() !!}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/2f9aa9b03d.js" crossorigin="anonymous"></script>
    <style>
        .btn-eliminar {
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-eliminar i {
            margin-right: 5px;
        }
    </style>

    <script>
        function confirmarEliminacion(formId) {
            Swal.fire({
                title: '¿Está seguro de que desea eliminar esta tarea?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fas fa-trash-alt"></i> Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>

    <div class="my-12">
        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-4"
            href="/tareas">
            Regresar
        </a>
    </div>
@stop
