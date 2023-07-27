@extends('plantillaM')
@section('contenido')

<center>
    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Tareas</span>
    <br><br><br>
</center>

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
@stop