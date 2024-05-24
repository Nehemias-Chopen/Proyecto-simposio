<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de Participación</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 50px;
        }

        .certificate-container {
            border: 10px solid #000;
            padding: 50px;
            position: relative;
            width: 800px;
            /* Ajusta el ancho del contenedor */
            height: 450px;
            /* Ajusta el alto del contenedor */
            margin: auto;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .subheader {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .content {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .signature {
            font-size: 16px;
            position: absolute;
            bottom: 50px;
            left: 50px;
            right: 50px;
            display: flex;
            justify-content: space-between;
        }

        .signature .name {
            border-top: 1px solid #000;
            padding-top: 5px;
        }
    </style>
</head>

<body>
    <div class="certificate-container">
        <div class="header">Simposio de Tecnología</div>
        <div class="subheader">Certificado de Participación</div>
        <div class="content">
            Este certificado se otorga a:<br>
            <strong>{{ $nombre }} {{ $carnet }}</strong><br>
            En reconocimiento a su participación en el simposio celebrado el<br>
            <strong>{{ $fecha }}</strong>
        </div>
        <div class="signature">
            <div class="name">
                <span>Estudiantes Ingenieria de Software</span><br>
                <span>Organizadores del Simposio</span>
            </div>
        </div>
    </div>
</body>

</html>
