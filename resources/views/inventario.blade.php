@extends('plantilla')
@section('contenido')

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inventario</title>
        <style>
            .text-align {
                width: 100%;
                /* Establece el ancho del contenedor */
                margin: 0 auto;
                /* Establece los márgenes izquierdo y derecho como "auto" para centrar el contenedor */
                text-align: center;
                /* Centra el texto dentro del contenedor */
            }

            .relative {
                margin-top: -20px;
            }

            .bg-white {
                margin-top: -80px;
            }
        </style>
    </head>
    
    <div class="bg-white rounded-lg shadow p-6" style="width: 50%; margin-left: 20px;">
        <div style="position: relative; z-index: 1;">
            <h1 class="text-blue-500" style="position: absolute; top: 0; left: 0;">Inventario</h1>
        </div>
        <br>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre del Producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripcion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Stock
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ubicacion
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Almacen
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
            
                @foreach ($producto as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->id_producto }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nombre_producto }}
                        </th>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->descripcion }}
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->stock }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->precio }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nombre_pasillo }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->nombre_almacen }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            $ {{ $item->precio * $item->stock }}
                        </th>
                    </tr>
                    @php
                        $total += $item->precio * $item->stock;
                    @endphp
                @endforeach
            
                <tr class="bg-white border-b dark:bg-black-800 dark:border-black-700 hover:bg-black-50 dark:hover:bg-black-600">
                    <td colspan="7" class="text-right font-bold text-black">Total:</td>
                    <td class="px-6 py-2 whitespace-nowrap font-bold pr-4 text-black">$ {{ $total }}</td>
                </tr>  
            </tbody>
        </table>
        <div class="flex justify-center">
            {!! $producto->links() !!}
        </div>
    </div>

    </html>
    <div class="my-12">
        <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-4"
            href="/inventario/index">
            Actualizar
        </a>
        <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-4"
            href="{{ route('generar_pdf_inventario') }}">
            Descargar PDF Inventario
        </a>
    </div>
    <!--<a href="{{ url()->previous() }}" class="btn-back">&larr; Regresar</a>-->
@stop
