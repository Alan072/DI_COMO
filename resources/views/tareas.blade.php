@extends('plantilla')
@section('contenido')
<div class="w-full max-w-xl p-4 bg-white mx-auto" style="max-width: 80%;">
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <form method="post" action="{{ route('CTarea_insertada') }}">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                    <textarea name="descripcion" style="resize: none;" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="XXXXXXXX" required></textarea>
                </div>
                <div>
                    <label for="nombre_producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione la salida</label>
                <select id="idsalida" name="idsalida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Selecciona la salida</option>
                    <?php
                    // Realizar la conexión a la base de datos
                    $conexion = mysqli_connect("localhost:3306", "root", "", "laravel");
                
                    // Verificar la conexión
                    if (!$conexion) {
                        die("Error al conectar a la base de datos: " . mysqli_connect_error());
                    }
                
                    // Realizar la consulta a la base de datos
                    $query = "SELECT * FROM salida";

                    $resultado = mysqli_query($conexion, $query);
                
                    // Verificar si la consulta devolvió resultados
                    if (mysqli_num_rows($resultado) > 0) {
                        // Iterar sobre los resultados y crear los elementos de la lista desplegable
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila["id_salida"] . "'>" . $fila["id_salida"] . "</option>";
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
                    <label for="nombre_producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione el Empleado</label>
                <select id="idusuario" name="idusuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Selecciona el Empleado</option>
                    <?php
                    // Realizar la conexión a la base de datos
                    $conexion = mysqli_connect("localhost:3306", "root", "", "laravel");
                
                    // Verificar la conexión
                    if (!$conexion) {
                        die("Error al conectar a la base de datos: " . mysqli_connect_error());
                    }
                
                    // Realizar la consulta a la base de datos
                    $query = "SELECT * FROM tipo_usuario";

                    $resultado = mysqli_query($conexion, $query);
                
                    // Verificar si la consulta devolvió resultados
                    if (mysqli_num_rows($resultado) > 0) {
                        // Iterar sobre los resultados y crear los elementos de la lista desplegable
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila["id_usuario"] . "'>" . $fila["nombre"] . "'>" . $fila["apellido_paterno"] . "'>" . $fila["apellido_materno"] . "</option>";
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
                    <label for="nombre_producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione el Empleado</label>
                <select id="idusuario" name="idusuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Selecciona el Empleado</option>
                    <?php
                    // Realizar la conexión a la base de datos
                    $conexion = mysqli_connect("localhost:3306", "root", "", "laravel");
                
                    // Verificar la conexión
                    if (!$conexion) {
                        die("Error al conectar a la base de datos: " . mysqli_connect_error());
                    }
                
                    // Realizar la consulta a la base de datos
                    $query = "SELECT * FROM tipo_usuario";

                    $resultado = mysqli_query($conexion, $query);
                
                    // Verificar si la consulta devolvió resultados
                    if (mysqli_num_rows($resultado) > 0) {
                        // Iterar sobre los resultados y crear los elementos de la lista desplegable
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila["id_usuario"] . "'>" . $fila["nombre"] . "'>" . $fila["apellido_paterno"] . "'>" . $fila["apellido_materno"] . "</option>";
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
                    <select id="idubicacion" name="idubicacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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
                    <label for="nombre_producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccione la entrada</label>
                <select id="identrada" name="identrada" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    <option value="" disabled selected>Selecciona la entrada</option>
                    <?php
                    // Realizar la conexión a la base de datos
                    $conexion = mysqli_connect("localhost:3306", "root", "", "laravel");
                
                    // Verificar la conexión
                    if (!$conexion) {
                        die("Error al conectar a la base de datos: " . mysqli_connect_error());
                    }
                
                    // Realizar la consulta a la base de datos
                    $query = "SELECT * FROM entrada";

                    $resultado = mysqli_query($conexion, $query);
                
                    // Verificar si la consulta devolvió resultados
                    if (mysqli_num_rows($resultado) > 0) {
                        // Iterar sobre los resultados y crear los elementos de la lista desplegable
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='" . $fila["id_entrada"] . "'>" . $fila["id_entrada"] . "</option>";
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
            </div>
            <div class="flex">
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aceptar</button>
                <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="/tb_reportes">
                    Consultar Tareas
                </a>
                </div>
            </div>
            
            
      </form>
    </div>
</div>
<script>
    const selectSalida = document.getElementById("idsalida");
    const selectEntrada = document.getElementById("identrada");
    
    selectSalida.addEventListener("change", function() {
        selectEntrada.disabled = true;
        selectSalida.disabled = false;
    });
    
    selectEntrada.addEventListener("change", function() {
        selectSalida.disabled = true;
        selectEntrada.disabled = false;
    });
</script>

@stop