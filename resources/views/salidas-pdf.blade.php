<head>
    <meta charset="UTF-8">
    <title>Salidas</title>
    <link rel="stylesheet" href="{{ public_path('css/stylePDF.css') }}">
</head>
<h1>Información de las Salidas</h1>
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
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach($salidas as $salida)
        <tr>
            <td>{{ $salida->id_salida }}</td>
            <td>{{ $salida->nombre_producto }}</td>
            <td>{{ $salida->cantidad }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
