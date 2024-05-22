<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Factura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center;">Boleta de pago</h1>
        <div>
            <p><strong>Número de Boleta:</strong> {{ $no_boleta }}</p>
        </div>
        <h2>Información del Alumno</h2>
        <table>
            <tr>
                <th>Carnet</th>
                <td>{{ $carnet }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $nombre }}</td>
            </tr>
            <tr>
                <th>Fecha</th>
                <td>{{ $fecha }}</td>
            </tr>
        </table>
        <h2>Información de la Inscripción</h2>
        <table>
            <tr>
                <th>Costo Inscripcion</th>
                <th>Suvenires Extra</th>
            </tr>
            <tr>
                <td>{{ $inscripcion }}</td>
                <td>{{ $subTotal }}</td>
            </tr>
        </table>
        <div class="total">Total: {{ $total }}</div>
    </div>
</body>

</html>
