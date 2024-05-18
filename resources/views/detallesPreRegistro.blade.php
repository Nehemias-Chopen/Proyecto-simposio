@extends('template')

@section('content')
    <div class="m-auto">
        <div
            class="w-[20rem] lg:w-[50rem] flex flex-col gap-10 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white lg:m-16">
            <div class="flex justify-center">
            </div>
            @if ($inscripcionvista)
                <div class="flex flex-col lg:flex-row lg:justify-between gap-6">
                    <div class="flex flex-col gap-4 lg:w-1/2">
                        <div class="flex flex-col lg:flex-row items-center gap-2">
                            <label for="carnet" class="lg:w-20">Carnet</label>
                            <input type="text" id="carnet" value="{{ $inscripcionvista->alumnos->carnet }}"
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                        <div class="flex flex-col lg:flex-row items-center gap-2">
                            <label for="telefono" class="lg:w-20">Nombre</label>
                            <input type="text" id="nombre" value="{{ $inscripcionvista->alumnos->nombre }}"
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                    </div>
                    <div class="flex flex-col gap-4 lg:w-1/2">
                        <div class="flex flex-col lg:flex-row items-center gap-2 lg:justify-end">
                            <label for="boleta" class="lg:w-20">No. Boleta</label>
                            <input type="text" id="boleta" value="{{ $inscripcionvista->no_boleta }}"
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                        <div class="flex flex-col lg:flex-row items-center gap-2 lg:justify-end">
                            <label for="fecha" class="lg:w-20">Fecha</label>
                            <input type="text" id="fecha" value="{{ $inscripcionvista->formatted_date }}"
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
                            @foreach ($simposio as $simposio)
                                <tr class="border border-slate-400 hover:bg-slate-300">
                                    <td class="p-2 min-w-44 text-center">Inscripción</td>
                                    <td class="p-2 min-w-44 text-center">Q. {{ $simposio->costo }}</td>
                                </tr>
                            @endforeach
                            <tr class="border border-slate-400 hover:bg-slate-300">
                                <td class="p-2 min-w-44 text-center">{{ $inscripcionvista->suvenir }}</td>
                                <td class="p-2 min-w-44 text-center">Q. ----</td>
                            </tr>
                            @foreach ($detalles as $item)
                                <tr class="border border-slate-400 hover:bg-slate-300">
                                    <td class="p-2 min-w-44 text-center">{{ $item->suvenir->nombre }}
                                    </td>
                                    <td class="p-2 min-w-44 text-center">{{ $item->suvenir->precio }}
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="border-t-2 border-t-double border-slate-400 hover:bg-slate-300 font-bold">
                                <td class="p-2 min-w-44 text-right">Total</td>
                                <td class="p-2 min-w-44 text-center">Q. {{ $inscripcionvista->total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="pt-5 flex justify-center lg:justify-end gap-5">
                    <button
                        class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                            href="{{ route('gestiones') }}">Cerrar</a></button>
                    <a href="{{ route('generarPDF') }}"
                        class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">
                        Imprimir Boleta
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
