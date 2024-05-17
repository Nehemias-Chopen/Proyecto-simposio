<!DOCTYPE html>
<html>
<head>
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
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
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
        <h1 style="text-align: center;">Detalles de Pre-Registro</h1>
        <h2>Información del Alumno</h2>
        <table>
            <tr>
                <th>Carnet</th>
                <td>{{ $alumno->carnet }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $alumno->nombre }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $alumno->telefono }}</td>
            </tr>
            <tr>
                <th>Semestre</th>
                <td>{{ $alumno->semestre }}</td>
            </tr>
        </table>
        <h2>Información de la Inscripción</h2>
        <table>
            <tr>
                <th>Total</th>
                <th>Estado</th>
                <th>Suvenir</th>
            </tr>
            <tr>
                <td>{{ $inscripciones->total }}</td>
                <td>{{ $inscripciones->estado }}</td>
                <td>{{ $inscripciones->suvenir }}</td>
            </tr>
        </table>
        <div class="total">Total: {{ $inscripciones->total }}</div>
    </div>
</body>
</html>
