@extends('plantilla')
@section('contenido')
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
    </head> 
    <style>
    .text-align {
        width: 100%; /* Establece el ancho del contenedor */
        margin: 0 auto; /* Establece los márgenes izquierdo y derecho como "auto" para centrar el contenedor */
        text-align: center; /* Centra el texto dentro del contenedor */
        padding: 50px;
    } 
    h1 {
		font-size: 32px;
		font-weight: bold;
		text-align: center;
		margin: 20px 0;
		color: #40fe46;
        
	}
    .img-montacargas {
        display: block; /* Establece la imagen como un elemento de bloque */
        margin: 20px auto; /* Establece los márgenes superior e inferior como 20px y los márgenes izquierdo y derecho como "auto" para centrar la imagen */
        width: 400px;
        height: 300px;
        
    }
    </style>

    <body>
    <div class="text-align">
        <h1>Bienvenido</h1> 
        <img class="img-montacargas" src="https://img.freepik.com/vector-gratis/carretilla-elevadora-amarilla-conductor-aislado-sobre-fondo-blanco_441769-130.jpg?size=626&ext=jpg" alt="Montacargas">
    </div>  
    </body>
</html>
@stop