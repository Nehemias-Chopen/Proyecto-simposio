<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirmación de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            margin: 50px auto;
            padding: 20px;
            max-width: 600px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #4CAF50;
            color: #ffffff;
        }

        .content {
            margin: 20px 0;
        }

        .footer {
            text-align: center;
            padding: 10px 0;
            font-size: 12px;
            color: #777777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Registro para Simposio</h1>
        </div>
        <div class="content">
            <p>Estimado/a {{ $alumno->nombre }},</p>
            <p>Gracias por registrarte para asistir al simposio.</p>
            <p>Hemos recibido tu registro y estamos procesando tu solicitud. Te confirmaremos tu inscripción lo antes
                posible.</p>
            <p>Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.</p>
            <p>Atentamente,</p>
            <p>Administracion</p>
            <p>consultas@umgsimposio.shop</p>
        </div>
        <div class="footer">
            <p>&copy; 2024 SimposioUMG. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>
