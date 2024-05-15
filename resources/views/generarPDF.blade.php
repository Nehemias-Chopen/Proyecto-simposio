<!DOCTYPE html>
<html>
<head>
    <title>PDF Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Datos del Usuario</h1>
    <table>
        <thead>
            <tr>
                <th>codigo</th>
                <th>nombre</th>
                <th>precio</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($datos as $dato )
        <tr>
                <th>{{$dato -> codigo}}</th>
                <th>{{$dato -> nombre}}</th>
                <th>{{$dato -> precio}}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
