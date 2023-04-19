@extends('plantilla')
@section('contenido')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="/ruta/a/bootbox.min.js"></script>

</head>
<body>
    

<div class="bg-white rounded-lg shadow p-6">
    <form method="post" action="{{ route('insertar_producto') }}">
        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nombre_producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Producto</label>
                <input type="text" id="nombre_producto" name="nombre_producto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sistemas" required>
            </div>

            <div>
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Comentarios del departamento" required>
            </div>
        </div>
        
    
        <button id="buttoninsert" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>

        <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="/productos_index">
            Consultar Productos
            </a>
    </form>
</div>
<br>

<style>
    .container {
      display: flex;
      flex-wrap: wrap;
    }
    .column {
      flex: 50%;
      padding: 10px;
      box-sizing: border-box;
    }
  </style>






@stop