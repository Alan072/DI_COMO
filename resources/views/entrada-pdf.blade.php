<head>
    <meta charset="UTF-8">
    <title>Entrada</title>
    <link rel="stylesheet" href="{{ public_path('css/stylePDF.css') }}">
</head>
<h1>Información de la Entrada</h1>
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
        <tr>
            <td>{{ $entrada->id_entrada }}</td>
            <td>{{ $entrada->nombre_producto }}</td>
            <td>{{ $entrada->cantidad }}</td>
        </tr>
    </tbody>
</table>
