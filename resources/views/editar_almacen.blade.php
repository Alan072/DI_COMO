@extends('plantilla')
@section('contenido')
<div style="margin-left: 20px;">
    
    <form method="post" action="{{ route('update_almacen', $almacen->id_almacen) }}">
    @csrf
     {!! method_field('PUT')!!}    @csrf
    <div class="bg-white rounded-lg shadow p-6" style="width: 50%; margin-left: 20px;">
        <label >Nombre almacen</label>
        <input type="text" name="nombrealmacen" value="{{$almacen->nombre_almacen}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="frágil" required>
        <br><br>
        <div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aceptar</button>
        <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="/almacen_index">
            Regresar
        </a>
        </div>
    </div>
</form>
</div>
@stop