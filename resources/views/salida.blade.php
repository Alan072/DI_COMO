@extends('plantilla')
@section('contenido')


<div class="bg-white rounded-lg shadow p-6" style="width: 50%; margin-left: 20px;">
    <form method="post" action="{{ route('insertar_salida') }}">
      @csrf
      <label for="producto_select" class="sr-only">Producto</label>
      <select id="producto_id" name="producto_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          <option value="" disabled selected>Selecciona un producto</option>
          <?php
            // Realizar la conexión a la base de datos
            $conexion = mysqli_connect("localhost:3306", "root", "", "laravel");
      
            // Verificar la conexión
            if (!$conexion) {
              die("Error al conectar a la base de datos: " . mysqli_connect_error());
            }
      
            // Realizar la consulta a la base de datos
            $query = "SELECT * FROM producto";
  
            $resultado = mysqli_query($conexion, $query);
      
            // Verificar si la consulta devolvió resultados
            if (mysqli_num_rows($resultado) > 0) {
              // Iterar sobre los resultados y crear los elementos de la lista desplegable
              while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<option value='" . $fila["id_producto"] . "'>" . $fila["nombre_producto"] . "</option>";
              }
            } else {
              // Si la consulta no devolvió resultados, mostrar un mensaje de error
              echo "<option value=''>No se encontraron resultados</option>";
            }
      
            // Cerrar la conexión a la base de datos
            mysqli_close($conexion);
          ?>
        </select>
      <br>
      <label >Cantidad</label><br>
      <input type="number" id="cantidad" name="cantidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
      <br><br>
      <div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aceptar</button>
          <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="/salida_index">
          Consultar salidas
      </a>
      </div>
    </form>
  
  </div>
  
  @stop
