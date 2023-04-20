@extends('plantillaM')
@section('contenido')
<center>
    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Tareas</span>
</center>
<div class="w-full max-w-xl p-4 bg-white  mx-auto">
        <div class="grid gap-6 mb-6 md:grid-cols-3">
            <div>
                <center>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Por hacer</label>
            </center>
            </div>
            <div>
                <center>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">En curso</label>
                </center>
            </div>
            <div>
                <center>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Terminado</label>
                </center>
            </div>  
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    XXXXXXXXXXXXXXXXX <br>
                    XXXXXXXXXXXXXXXXX <br>
                    XXXXXXXXXXXXXXXXX <br>
                    XXXXXXXXXXXXXXXXX <br>
                </label>
            </div>
            <div class="mb-6">
                <center>
                    <button class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                            <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                          </svg>
                    </button><br>
                    <label >00:00:00</label>
                </center>                
            </div>
            <div class="mb-6">
                <center>
                    <button class="red-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                          </svg>
                        </button><br>
                        <label >00:00:00</label>
                </center> 
            </div>
            
            <div>
                <center>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Próxima tarea</label>
            </center>
            </div>
            <div>
                <center>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">En curso</label>
                </center>
            </div>
            <div>
                <center>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Terminado</label>
                </center>
            </div>  
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    XXXXXXXXXXXXXXXXX <br>
                    XXXXXXXXXXXXXXXXX <br>
                    XXXXXXXXXXXXXXXXX <br>
                    XXXXXXXXXXXXXXXXX <br>
                </label>
            </div>
            <div class="mb-6">
                <center>
                    <button class="gray-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-play" viewBox="0 0 16 16">
                            <path d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z"/>
                          </svg>
                    </button><br>
                    <label >00:00:00</label>
                </center>                
            </div>
            <div class="mb-6">
                <center>
                    <button class="gray-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                          </svg>
                        </button><br>
                        <label >00:00:00</label>
                </center> 
            </div>
        </div>
          
          
    </form>
</div>
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