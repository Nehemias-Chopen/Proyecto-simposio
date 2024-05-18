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
<<<<<<< HEAD

        table,
        th,
        td {
            border: 1px solid black;
=======
        table, th, td {
            border: 1px solid #ccc;
>>>>>>> 6ee76df95e423020c5a9f49fd06e7d98df737a0c
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
<<<<<<< HEAD
    <div class="m-auto">
        <div
            class="w-[20rem] lg:w-[50rem] flex flex-col gap-10 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white lg:m-16">
            <div class="flex justify-center">
            </div>
            <div class="flex flex-col lg:flex-row lg:justify-between gap-6">
                <div class="flex flex-col gap-4 lg:w-1/2">
                    <div class="flex flex-col lg:flex-row items-center gap-2">
                        <label for="carnet" class="lg:w-20">Carnet</label>
                        <input type="text" id="carnet" placeholder="Carnet" name="nombre" required
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex flex-col lg:flex-row items-center gap-2">
                        <label for="telefono" class="lg:w-20">Teléfono</label>
                        <input type="text" id="telefono" placeholder="Teléfono" name="telefono" required
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                </div>
                <div class="flex flex-col gap-4 lg:w-1/2">
                    <div class="flex flex-col lg:flex-row items-center gap-2 lg:justify-end">
                        <label for="boleta" class="lg:w-20">No. Boleta</label>
                        <input type="text" id="boleta" placeholder="No. Boleta" name="no.Boleta" required
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex flex-col lg:flex-row items-center gap-2 lg:justify-end">
                        <label for="fecha" class="lg:w-20">Fecha</label>
                        <input type="text" id="fecha" placeholder="Fecha" name="fecha" required
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                </div>
            </div>
            <div class="max-w-[50rem] overflow-x-scroll overflow-y-scroll lg:max-w-full overflow-hidden p-2">
                <table class="bg-slate-200 min-w-[28rem] w-full rounded-lg border border-slate-400">
                    <thead>
                        <tr class="bg-sky-900 text-white">
                            <th class="p-2">Detalles</th>
                            <th class="p-2">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border border-slate-400 hover:bg-slate-300">
                            <td class="p-2 min-w-44 text-center">Inscripción</td>
                            <td class="p-2 min-w-44 text-center">Q. 350</td>
                        </tr>
                        <tr class="border border-slate-400 hover:bg-slate-300">
                            <td class="p-2 min-w-44 text-center">Playera Talla M</td>
                            <td class="p-2 min-w-44 text-center">Q. 0</td>
                        </tr>
                        <tr class="border border-slate-400 hover:bg-slate-300">
                            <td class="p-2 min-w-44 text-center">Gorra</td>
                            <td class="p-2 min-w-44 text-center">Q. 20</td>
                        </tr>
                        <tr class="border border-slate-400 hover:bg-slate-300">
                            <td class="p-2 min-w-44 text-center">Taza</td>
                            <td class="p-2 min-w-44 text-center">Q. 40</td>
                        </tr>
                        <tr class="border-t-2 border-t-double border-slate-400 hover:bg-slate-300 font-bold">
                            <td class="p-2 min-w-44 text-right">Total</td>
                            <td class="p-2 min-w-44 text-center">Q. 410</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
=======
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
>>>>>>> 6ee76df95e423020c5a9f49fd06e7d98df737a0c
    </div>
</body>

</html>
