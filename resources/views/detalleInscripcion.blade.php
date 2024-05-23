@extends('template')

@section('content')
    <div class="m-auto">
        @foreach ($resultados as $detalle)
            <div
                class="w-[20rem] lg:w-[50rem] flex flex-col gap-6 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white lg:m-16">
                <h2 class="text-2xl font-bold text-center mt-2">Datos
                </h2>
                <div class="flex justify-center">
                </div>
                <div class="flex flex-col lg:flex-row lg:justify-between gap-6">
                    <div class="flex flex-col gap-4 lg:w-1/2">
                        <div class="flex flex-col lg:flex-row items-center gap-2">
                            <label for="carnet" class="lg:w-20">Carnet</label>
                            <input type="text" id="carnet" value="{{ $detalle['alumno']->carnet }}" readonly
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                        <div class="flex flex-col lg:flex-row items-center gap-2">
                            <label for="telefono" class="lg:w-20">Nombre</label>
                            <input type="text" id="nombre" value="{{ $detalle['alumno']->nombre }}" readonly
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 lg:w-1/2">
                        <div class="flex flex-col lg:flex-row items-center gap-2 lg:justify-end">
                            <label for="boleta" class="lg:w-20">No. Boleta</label>
                            <input type="text" id="boleta" value="{{ $detalle['inscripcion']->no_boleta }}" readonly
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                        <div class="flex flex-col lg:flex-row items-center gap-2 lg:justify-end">
                            <label for="fecha" class="lg:w-20">Fecha</label>
                            <input type="text" id="fecha"
                                value="{{ $detalle['inscripcion']->created_at->format('Y-m-d') }}" readonly
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-center mt-2">Suvenires
                </h2>
                <div class="max-w-[50rem] overflow-x-scroll overflow-y-scroll lg:max-w-full overflow-hidden p-2 mt-4">
                    <table class="bg-slate-200 min-w-[28rem] w-full rounded-lg border border-slate-400">
                        <thead>
                            <tr class="bg-sky-900 text-white">
                                <th class="p-2">Nombre</th>
                                <th class="p-2">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border border-slate-400 hover:bg-slate-300">
                                <td class="p-2 min-w-44 text-center">{{ $detalle['inscripcion']->suvenir }}</td>
                                <td class="p-2 min-w-44 text-center">Q. ----</td>
                            </tr>
                            @foreach ($detalle['suvenires'] as $suvenires)
                                @foreach ($suvenires as $suvenir)
                                    <tr class="border border-slate-400 hover:bg-slate-300">
                                        <td class="p-2 min-w-44 text-center">{{ $suvenir->nombre }}
                                        </td>
                                        <td class="p-2 min-w-44 text-center">{{ $suvenir->precio }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="pt-5 flex justify-center lg:justify-end gap-5">
                    <button
                        class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white">
                        <a href="{{ route('comprobarBoleta') }}">Cerrar</a>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endsection
