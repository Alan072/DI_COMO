@extends('plantilla')
@section('contenido')

<form method="post" action="{{ route('insertar_producto') }}">
    @csrf
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="nombre_producto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Producto</label>
            <input type="text" id="nombre_producto" name="nombre_producto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Balon de Futbol" required>
        </div>
        <div>
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion</label>
            <input type="text" id="descripcion" name="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Material textil" required>
        </div>
    
        <button type="submit" id="buttoninsert" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
    </div> <!-- Cierre de la etiqueta div -->
    
    <div id="mensaje" class="mensaje oculto">El producto se ha guardado correctamente</div>
    
    <a class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="/productos">
        Consultar Productos
    </a>
</form>


<script>
    const mensaje = document.getElementById('mensaje');

function mostrarMensaje(texto) {
  mensaje.textContent = texto;
  mensaje.classList.remove('oculto');
  setTimeout(function() {
    mensaje.classList.add('oculto');
  }, 3000); // 3 segundos
}

const formulario = document.querySelector('form');
formulario.addEventListener('submit', function(evento) {
  evento.preventDefault();
  // guardar el producto
  mostrarMensaje('El producto se ha guardado correctamente');
});

</script>

<style>
    .mensaje {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  background-color: #4caf50;
  color: white;
  padding: 1rem;
  text-align: center;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
  z-index: 1000;
  transition: opacity 0.3s ease-out;
}

.mensaje.oculto {
  opacity: 0;
  pointer-events: none;
}

</style>

 
@stop