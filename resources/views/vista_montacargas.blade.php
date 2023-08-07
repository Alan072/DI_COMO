@extends('plantillaM')
@section('contenido')

<center>
    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Tareas Pendientes</span>
    <br><br><br>
</center>

<div style="margin-left: 20px;">
  <div class="inline-flex rounded-md shadow-sm" role="group">
    <a href="/tarea_montacargas"
      class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white
      {{ request()->is('tareas_montacargas') ? 'active-link' : '' }}">
      <svg aria-hidden="true" class="w-4 h-4 mr-2 fill-current" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path
          d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z">
        </path>
      </svg>
      Tareas Por Hacer
    </a>
  </div>

  <div class="inline-flex rounded-md shadow-sm" role="group">
    <a href="/tareas_completas"
      class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white
      {{ request()->is('tareas_completas') ? 'active-link' : '' }}">
      <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
      Tareas Completadas
    </a>
  </div>
</div>

<div class="w-full max-w-2xl p-6 bg-white mx-auto">
  <div class="grid gap-8 md:grid-cols-3">
     
    @foreach($tarea as $tarea)


<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
  <a href="#">
      <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Tarea: {{$tarea->id_tarea}}</h5>
  </a>
  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Descripcion: {{$tarea->descripcion}}</p>

  <a href="{{ route('show_tareaM', $tarea->id_tarea) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      Comenzar Tarea
      <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
      </svg>
  </a>
</div>

 @endforeach
  </div>
</div>
<style>
.active-link {
  background-color: #f0f0f0; /* Cambia esto por el color que desees para resaltar */
  border-color: #cbd5e0; /* Cambia esto por el color que desees para el borde */
}

</style>


@stop