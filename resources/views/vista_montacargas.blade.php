@extends('plantillaM')
@section('contenido')
<center>
    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Tareas</span>
    <br><br><br>
</center>

<div class="w-full max-w-2xl p-6 bg-white mx-auto">
  <div class="grid gap-8 mb-8 md:grid-cols-3">
    <div>
      <center>
        <label class="block mb-3 text-lg font-medium text-gray-900 dark:text-white">Por hacer</label>
      </center>
    </div>
    <div>
      <center>
        <label for="last_name" class="block mb-3 text-lg font-medium text-gray-900 dark:text-white">En curso</label>
      </center>
    </div>
    <div>
      <center>
        <label for="company" class="block mb-3 text-lg font-medium text-gray-900 dark:text-white">Terminado</label>
      </center>
    </div>
  </div>

  <div class="grid gap-8 md:grid-cols-3">
    @foreach($tarea as $tarea)
    <div class="border rounded-lg p-4 bg-white dark:bg-gray-800">
      <div class="tarea" data-id="{{ $tarea->id_tarea }}">
        <label class="block mb-3 text-lg font-medium text-gray-900 dark:text-white">
          Descripcion: {{ $tarea->descripcion }} <br>
          Ubicacion: {{ $tarea->pasillo }} <br>
          Rack: {{ $tarea->racks }} <br>
        </label>
      </div>
      <div class="mb-8">
        <center>
          <button class="play-button w-14 h-14" onclick="startTimer('{{ $tarea->id_tarea }}')">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
              <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
            </svg>
          </button><br>
          <label class="text-lg" id="timer_{{ $tarea->id_tarea }}">00:00:00</label>
        </center>                
      </div>
      <div class="mb-8">
        <center>
          <button class="red-button w-14 h-14" onclick="stopTimer('{{ $tarea->id_tarea }}')">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            </svg>
          </button><br>
          <label class="text-lg">Terminar</label>
        </center>
      </div>
    </div>
    @endforeach
  </div>
</div>

<script>
  let timers = {};

  function startTimer(id) {
    if (!timers[id]) {
      const timerElement = document.getElementById(`timer_${id}`);
      const startTime = new Date().getTime();

      timers[id] = setInterval(() => {
        const currentTime = new Date().getTime();
        const timeDiff = currentTime - startTime;
        const seconds = Math.floor(timeDiff / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);

        const formattedTime = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        timerElement.textContent = formattedTime;
      }, 1000);
    }
  }

  function stopTimer(id) {
    if (timers[id]) {
      clearInterval(timers[id]);
      delete timers[id];

      const tareaElement = document.querySelector(`.tarea[data-id="${id}"]`);
      if (confirm("¿Estás seguro de terminar la tarea?")) {
        tareaElement.parentElement.remove();
      }
    }
  }
</script>




<style>
    .play-button {
  width: 50px;
  height: 50px;
  background-color: green;
  color: white;
  border-radius: 50%;
  border: none;
  outline: none;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 24px;
}

.red-button {
  width: 50px;
  height: 50px;
  background-color: red;
  color: white;
  border-radius: 50%;
  border: none;
  outline: none;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 24px;
}

.gray-button {
  width: 50px;
  height: 50px;
  background-color: gray;
  color: white;
  border-radius: 50%;
  border: none;
  outline: none;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 24px;
}

.play-button i {
  margin-left: 1px;
}

</style>




 
@stop