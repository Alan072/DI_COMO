@extends('plantilla')
@section('contenido')
<div class="bg-white rounded-lg shadow p-6" style="width: 50%; margin-left: 20px;">
    <label for="producto_select" class="sr-only">Producto</label>
    <select id="producto_select" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
        <option selected>Producto</option>
        <option value="p1">Producto 1</option>
        <option value="p2">Producto 2</option>
        <option value="p3">Producto 3</option>
        <option value="p4">Producto 4</option>
    </select>
    <br>
    <label >Cantidad</label><br>
    <input type="number" id="cantidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
    <br><br>
    <div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aceptar</button>
    <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="/tb_reportes">
        Consultar entradas
    </a>
    </div>
</div>

@stop