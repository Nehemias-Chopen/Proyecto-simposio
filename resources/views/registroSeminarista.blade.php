@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Inscripcion Seminarista</h2>
            @if (session('success'))
                <div id="successMessage" class="bg-green-200 text-green-800 p-3 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('registroSeminarista') }}">
                @csrf
                <div class="flex flex-col gap-5">
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Nombres</p>
                        <input type="text" placeholder="Nombres" name="nombres"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Apellidos</p>
                        <input type="text" placeholder="Apellidos" name="apellidos"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Tema</p>
                        <input type="text" placeholder="Tema" name="tema"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Telefono</p>
                        <input type="text" placeholder="Telefono ( xxxx-xxxx )" name="telefono"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>

                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Viaticos</p>
                        <input type="num" placeholder="Viaticos (0.00)" name="viaticos"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>

                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Hoja de vida</p>
                        <!-- Cambio del tipo de entrada a textarea y ajuste del tamaño -->
                        <textarea placeholder="Hoja de vida" rows="5" name="hoja_vida"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-lg"></textarea>
                    </div>

                    <div class="pt-5 flex justify-center lg:justify-center gap-5 lg:gap-20">
                        <button
                            class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                                href="{{ route('seminaristas') }}">anterior</a></button>
                        <button
                            class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">siguiente</button>
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
