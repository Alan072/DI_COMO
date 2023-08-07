<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="{{ public_path('css/stylePDF.css') }}">
</head>
<h1>Información del Inventario</h1>
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
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @php
            $total = 0;
        @endphp
        @foreach ($inventario as $producto)
            <tr>
                <td>{{ $producto->id_producto }}</td>
                <td>{{ $producto->nombre_producto }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->precio }}</td>
                <td>{{ $producto->nombre_pasillo }}</td>
                <td>{{ $producto->nombre_almacen }}</td>
                @php
                    $total += $producto->precio * $producto->stock;
                @endphp
                <td>{{ $producto->precio * $producto->stock }}</td>
            </tr>
        @endforeach
        <tr class="bg-white border-b dark:bg-black-800 dark:border-black-700 hover:bg-black-50 dark:hover:bg-black-600">
            <td colspan="7" class="text-right font-bold text-black">Total:</td>
            <td class="px-6 py-2 whitespace-nowrap font-bold pr-4 text-black">$ {{ $total }}</td>
        </tr> 
    </tbody>
</table>
