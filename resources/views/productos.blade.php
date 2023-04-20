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
                <input type="text" id="nombre_producto" name="nombre_producto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Balon de futbol" required>
            </div>

            <div>
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Material sintetico" required>
            </div>

            

            <div>
                <label for="nombre_producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione el Almacen</label>
                <select id="almacen_id" name="almacen_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Selecciona el Almacen</option>
                    <?php
                    // Realizar la conexión a la base de datos
                    $conexion = mysqli_connect("localhost:3306", "root", "", "laravel");
                
                    // Verificar la conexión
                    if (!$conexion) {
                        die("Error al conectar a la base de datos: " . mysqli_connect_error());
                    }
                
                    // Realizar la consulta a la base de datos
                    $query = "SELECT * FROM almacen";

                    $resultado = mysqli_query($conexion, $query);
                
                    // Verificar si la consulta devolvió resultados
                    if (mysqli_num_rows($resultado) > 0) {
                        // Iterar sobre los resultados y crear los elementos de la lista desplegable
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila["id_almacen"] . "'>" . $fila["nombre_almacen"] . "</option>";
                        }
                    } else {
                        // Si la consulta no devolvió resultados, mostrar un mensaje de error
                        echo "<option value=''>No se encontraron resultados</option>";
                    }
                
                    // Cerrar la conexión a la base de datos
                    mysqli_close($conexion);
                    ?>
                </select>
            </div>
            


            <div>
                <label for="nombre_producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione la ubicacion</label>
                <select id="ubicacion_id" name="ubicacion_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Selecciona la ubicacion</option>
                    <?php
                    // Realizar la conexión a la base de datos
                    $conexion = mysqli_connect("localhost:3306", "root", "", "laravel");
                
                    // Verificar la conexión
                    if (!$conexion) {
                        die("Error al conectar a la base de datos: " . mysqli_connect_error());
                    }
                
                    // Realizar la consulta a la base de datos
                    $query = "SELECT * FROM ubicacion";

                    $resultado = mysqli_query($conexion, $query);
                
                    // Verificar si la consulta devolvió resultados
                    if (mysqli_num_rows($resultado) > 0) {
                        // Iterar sobre los resultados y crear los elementos de la lista desplegable
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila["id_ubicacion"] . "'>" . $fila["pasillo"] . "' Rack:" . $fila["racks"] . "</option>";
                        }
                    } else {
                        // Si la consulta no devolvió resultados, mostrar un mensaje de error
                        echo "<option value=''>No se encontraron resultados</option>";
                    }
                
                    // Cerrar la conexión a la base de datos
                    mysqli_close($conexion);
                    ?>
                </select>
            </div>

            <div>
                <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                <input type="number" id="precio" name="precio" min="0.00" max="999999.99" step="0.01" placeholder="0.00" required>
            </div>
        </div>

        <script>
            function mostrarAlerta() {
              alert("Registro ingresado exitosamente");
            }
          </script>
        <button onclick="mostrarAlerta()" id="buttoninsert" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>

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