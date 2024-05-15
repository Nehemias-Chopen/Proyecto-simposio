@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">SIMPOSIO</h2>
            @if (session('success'))
                <div id="successMessage" class="bg-green-200 text-green-800 p-3 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('actualizarSimposio', $simposio) }}">
                @csrf @method('PUT')
                <div class="pt-10">
                    <div class="flex flex-col gap-4">
                        <div class="flex">
                            <p class="hidden lg:w-20 lg:flex lg:items-center">Tema</p>
                            <input type="text" value="{{ $simposio->tema }}" name="tema"
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                        <div class="flex">
                            <p class="hidden lg:w-20 lg:flex lg:items-center">Costo</p>
                            <input type="text" value="{{ $simposio->costo }}" name="costo"
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                    </div>
                    <div class="pt-5 flex justify-center gap-5">
                        <button class="btn-secondary"><a href="{{ route('moduloDisponible') }}">anterior</a></button>
                        <input type="submit"
                            class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white"
                            value="Actualizar">
                    </div>
                </div>
            </form>
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
