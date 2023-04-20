@extends('plantilla')
@section('contenido')

<div class="bg-white rounded-lg shadow p-6">
    <form method="post" action="{{ route('update_empleado', $tipo_usuario->id_usuario) }}">
        @csrf
         {!! method_field('PUT')!!}
         <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input type="text" id="nombre" value="{{ $tipo_usuario->nombre}}" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Alejandro" required>
            </div>
            <div>
                <label for="apellidop" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido paterno</label>
                <input type="text" id="apellido_paterno" value="{{ $tipo_usuario->apellido_paterno}}" name="apellido_paterno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Martínez" required>
            </div>
            <div>
                <label for="apellidom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido materno</label>
                <input type="text" id="apellido_materno" value="{{ $tipo_usuario->apellido_materno}}" name="apellido_materno" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Sarmiento" required>
            </div>  
            <div>
                <label for="empresa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Empresa</label>
                <input type="text" id="empresa" value="{{ $tipo_usuario->empresa}}" name="empresa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="COMO" required>
            </div> 
            <div>
                <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
                <input type="text" id="direccion" value="{{ $tipo_usuario->direccion}}" name="direccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Calle, numero" required>
            </div>
            <div>
                <label for="pais" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">País</label>
                <input type="text" id="pais" value="{{ $tipo_usuario->pais}}" name="pais" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="México" required>
            </div>  
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo</label>
                <input type="email" id="correo" value="{{ $tipo_usuario->correo}}" name="correo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="alejandromarts@outlook.com" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <div class="relative">
                  <input type="password" id="password" value="{{ $tipo_usuario->contrasena}}" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="********" required>
                  <button type="button" class="absolute inset-y-0 right-0 px-3 py-2 bg-gray-200 rounded-md text-gray-700 dark:bg-gray-500 dark:text-gray-200" onclick="togglePasswordVisibility()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                      <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                    </svg>
                </button>
                </div>
              </div>
            <div>
                <label for="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono personal</label>
                <input type="number" id="telefono_celular" value="{{ $tipo_usuario->telefono_celular}}" name="telefono_celular" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" required>
            </div>
            <div>
                <label for="telfijo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono fijo</label>
                <input type="number" id="telefono_fijo" value="{{ $tipo_usuario->telefono_fijo}}" name="telefono_fijo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="123-45-678" required>
            </div>
            <div>
                
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Puesto</label>
  <select id="rol_desempena" name="rol_desempena" value="{{ $tipo_usuario->rol_desempena}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
      <option value=""  disabled selected>Selecciona el puesto</option>
      <?php
        // Realizar la conexión a la base de datos
        $conexion = mysqli_connect("localhost:3307", "root", "", "laravel");
  
        // Verificar la conexión
        if (!$conexion) {
          die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }
  
        // Realizar la consulta a la base de datos
        $query = "SELECT * FROM rol_desempena";

        $resultado = mysqli_query($conexion, $query);
  
        // Verificar si la consulta devolvió resultados
        if (mysqli_num_rows($resultado) > 0) {
          // Iterar sobre los resultados y crear los elementos de la lista desplegable
          while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<option value='" . $fila["id_rol"] . "'>" . $fila["nombre_rol"] . "</option>";
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
              <script>
                function mostrarAlerta() {
                  alert("Registro ingresado exitosamente");
                }
              </script>
                <button onclick="mostrarAlerta()" id="buttoninsert" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="/empleado_index">
                    Regresar
                </a>
            </div>
            <script>
                function togglePasswordVisibility() {
                    var passwordInput = document.getElementById("password");
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                    } else {
                        passwordInput.type = "password";
                    }
                }
            </script>
    </form>
</div>

@stop