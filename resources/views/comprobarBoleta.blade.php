@extends('template')

@section('content')
    <div class="w-[100%] lg:w-[80%] m-auto flex justify-center items-center;">
        <div
            class="w-[90%] lg:w-[100%] m-auto flex flex-col gap-4 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white lg:m-16">
            <div>
                <button
                    class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white">
                    <a href="{{ route('moduloDisponible') }}">Volver</a>
                </button>
            </div>
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Comprobacion de Boleta</h2>
            <div class="max-w-[50rem] overflow-x-scroll max-h-[35vh] lg:max-w-full overflow-hidden p-2 relative">
                <table class="bg-slate-200 min-w-[28rem] w-full rounded-lg border border-slate-400">
                    <thead>
                        <tr>
                            <th class="p-2">No Boleta</th>
                            <th class="p-2">Estudiante</th>
                            <th class="p-2">Total</th>
                            <th class="p-2">Comprobante</th>
                            <th class="p-2">Estado</th>
                            <th class="p-2">Telefono</th>
                            <th class="p-2">Confirmar </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inscripciones as $inscripciones)
                            <tr class="border border-slate-400 hover:bg-slate-300">
                                <td class="p-2 min-w-44 text-center">{{ $inscripciones->no_boleta }}</td>
                                <td class="p-2 min-w-44 text-center">{{ $inscripciones->estudiante }}</td>
                                <td class="p-2 min-w-44 text-center">{{ $inscripciones->total }}</td>
                                <td class="p-2 min-w-44 text-center">
                                    <a href="{{ asset($inscripciones->imagen) }}" target="_blank">
                                        <img src="{{ asset($inscripciones->imagen) }}"
                                            class="w-20 h-20 object-cover rounded" alt="Comprobante">
                                    </a>
                                </td>
                                <td class="p-2 min-w-44 text-center">{{ $inscripciones->estado }}</td>
                                <td class="p-2 min-w-44 text-center">
                                    <a href="https://wa.me/{{ $inscripciones->alumnos->telefono }}" target="_blank"
                                        class="text-blue-500 hover:underline">
                                        {{ $inscripciones->alumnos->telefono }}
                                    </a>
                                </td>
                                <td class="p-2 min-w-44 text-center">
                                    @if ($inscripciones->estado !== 'Inscrito')
                                        <form method="POST"
                                            action="{{ route('inscripciones.inscribir', $inscripciones->no_boleta) }}"
                                            onsubmit="return confirmUpdate()">
                                            @csrf
                                            <script>
                                                function confirmUpdate() {
                                                    return confirm(
                                                        '¿Está seguro de que desea confirmar la inscripción del estudiante {{ $inscripciones->estudiante }}?');
                                                }
                                            </script>
                                            <button type="submit"
                                                class="py-2 px-2 rounded-full bg-green-500 text-white text-sm font-bold active:bg-yellow-600 hover:bg-yellow-400 hover:text-white">
                                                <img src="{{ asset('/img/validacion.png') }}" class="w-5"
                                                    alt="">
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center gap-1 pt-5 flex-col">
                <h4 class="text-lg font-bold">Buscar</h4>
                <div class="flex items-center gap-2">
                    <form method="GET" action="{{ route('comprobarBoleta') }}">
                        <input type="text" placeholder="Buscar" name="search" value="{{ request('search') }}"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        <button
                            class="py-2 px-2 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">
                            <img src="{{ asset('/img/lupa.png') }}" class="w-5" alt="">
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
