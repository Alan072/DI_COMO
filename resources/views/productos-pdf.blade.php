<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link rel="stylesheet" href="{{ public_path('css/stylePDF.css') }}">
</head>
<h1>Información de los Productos</h1>
<style>
    h1 {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        color: red;
    }

    /* Estilo para la tabla */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
    }

    th {
        font-weight: bold;
        background-color: #f2f2f2;
        text-align: center;
    }

    td {
        text-align: center;
    }
</style>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Descripcion</th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Ubicacion</th>
            <th>Almacen</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td>{{ $producto->id_producto }}</td>
            <td>{{ $producto->nombre_producto }}</td>
            <td>{{ $producto->descripcion }}</td>
            <td>{{ $producto->stock }}</td>
            <td>{{ $producto->precio }}</td>
            <td>{{ $producto->nombre_pasillo }}</td>
            <td>{{ $producto->nombre_almacen }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
