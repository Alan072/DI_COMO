@extends('plantillaM')
@section('contenido')

<center>
    <a  class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://www.tustareas.com.mx/wp-content/uploads/2020/12/LogoTusTareasHor.png">
        <div class="flex flex-col justify-between p-4 leading-normal">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tarea: {{ $tareaDetalle->id_tarea }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Descripcion: {{ $tareaDetalle->descripcion }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Pasillo: {{ $tareaDetalle->pasillo }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Racks: {{ $tareaDetalle->racks }}</p>

        </div>
    </a>
    <!-- Botón para marcar como completado -->
    <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg mt-4" onclick="marcarComoCompletado({{ $tareaDetalle->id_tarea }})">
        Marcar como Completado
    </button>
    
</center>

<!-- ... Tu código HTML ... -->

<!-- Agrega esta sección al final de tu archivo para incluir el código JavaScript -->
<script>
  // Función para marcar la tarea como completada
  function marcarComoCompletado(tareaId) {
    if (confirm("¿Estás seguro de marcar la tarea como completada?")) {
      // Hacer la solicitud AJAX al servidor para actualizar el estado de la tarea
      axios.post('/marcar_como_completado', { tareaId: tareaId })
        .then(response => {
          console.log("Respuesta del servidor:", response.data);

          // Recargar la página para actualizar la lista de tareas
          location.reload();
        })
        .catch(error => {
          console.error("Error en la solicitud:", error);
          alert("Error al marcar la tarea como completada");
        });
    }
  }
</script>


@stop