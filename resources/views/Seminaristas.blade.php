@extends('template')

@section('content')
    <div class="w-[100%] lg:w-[80%] m-auto flex justify-center items-center;">
        <div
            class="w-[90%] lg:w-[100%] m-auto flex flex-col gap-4 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white lg:m-16">
            <div class="flex justify-between"> <!-- Contenedor de botones con distribución entre ellos -->
                <div>
                    <button
                        class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                            href="{{ route('moduloDisponible') }}">Volver</a></button>
                </div>
                <div class="ml-auto"> <!-- Botón Registrar alineado a la derecha -->
                    <button
                        class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                            href="{{ route('registroSeminarista') }}">Nuevo</a></button>
                </div>
            </div>
            @if (session('success'))
                <div id="successMessage" class="bg-green-200 text-green-800 p-3 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Seminaristas</h2>
            <div class="max-w-[50rem] overflow-x-scroll overflow-y-scroll max-h-[35vh] lg:max-w-full overflow-hidden p-2">
                <table class=" bg-slate-200 min-w-[28rem] w-full rounded-lg border border-slate-400 ">
                    <thead>
                        <tr>
                            <th class="p-2">Nombre</th>
                            <th class="p-2">Tema</th>
                            <th class="p-2">Viaticos</th>
                            <th class="p-2">Telefono</th>
                            <th class="p-2"></th>
                            <th class="p-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seminarista as $seminarista)
                            <tr class="border border-slate-400 hover:bg-slate-300">
                                <td class="p-2 min-w-44"><a
                                        href="{{ route('infoSeminarista', $seminarista->id_seminarista) }}">{{ $seminarista->nombres }},
                                        {{ $seminarista->apellidos }}</a>
                                </td>
                                <td class="p-2 min-w-28">{{ $seminarista->tema }}</td>
                                <td class="p-2 min-w-28">{{ $seminarista->viaticos }}</td>
                                <td class="p-2">{{ $seminarista->telefono }}</td>
                                <td>
                                    <button
                                        class="py-2 px-2 rounded-full bg-yellow-500 text-white text-sm font-bold active:bg-yellow-600 hover:bg-yellow-400 hover:text-white">
                                        <a href="{{ route('editarSeminarista', $seminarista->id_seminarista) }}"><img
                                                src="{{ asset('/img/editar.png') }}" class="w-5" alt=""></a>
                                    </button>
                                </td>
                                <td>
                                    <form action="{{ route('eliminarSeminarista', $seminarista->id_seminarista) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar ( {{ $seminarista->nombres }}, {{ $seminarista->apellidos }} )?')"
                                            class="py-2 px-2 rounded-full bg-red-500 text-white text-sm font-bold active:bg-red-600 hover:bg-red-400 hover:text-white">
                                            <img src="{{ asset('/img/eliminar.png') }}" class="w-5" alt="Eliminar">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center gap-1 pt-5 flex-col">
                <h4 class="text-lg font-bold">Buscar</h4>
                <div class="flex items-center gap-2">
                    <form method="GET" action="{{ route('seminaristas', $seminarista) }}">
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
    <script>
        setTimeout(function() {
            var element = document.getElementById('successMessage');
            if (element)
                element.style.display = 'none';
        }, 5000); // 5000 milisegundos = 5 segundos
    </script>
@endsection
