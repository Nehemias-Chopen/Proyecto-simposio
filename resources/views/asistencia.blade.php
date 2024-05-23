@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Asistencia</h2>
            @foreach ($inscripciones as $inscripcion)
                <form method="POST" action="{{ route('confirmarAsistencia', $inscripcion->no_boleta) }}">
                    @csrf
                    <div class="flex flex-col gap-5">
                        <div class="flex">
                            <p class="hidden lg:w-20 lg:flex lg:items-center">Nombre</p>
                            <input type="text" value="{{ $inscripcion->alumnos->nombre }}" name="nombre"
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full"
                                readonly>
                        </div>
                        <div class="flex">
                            <p class="hidden lg:w-20 lg:flex lg:items-center">Carnet</p>
                            <input type="text" value="{{ $inscripcion->estudiante }}" name="carnet"
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full"
                                readonly>
                        </div>
                        <div class="flex">
                            <p class="hidden lg:w-20 lg:flex lg:items-center">No. Boleta</p>
                            <input type="text" value="{{ $inscripcion->no_boleta }}" name="no_boleta"
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full"
                                readonly>
                        </div>
                        <div class="pt-5 flex justify-center lg:justify-center gap-5 lg:gap-20">
                            <button type="submit" id="submitBtn"
                                class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">Confirmar
                                Asistencia</button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    <script>
        document.getElementById('comprobanteForm').addEventListener('submit', function(event) {
            var inputFile = document.getElementById('input-file-type');
            if (inputFile.files.length === 0) {
                event.preventDefault();
                alert('Por favor, sube una imagen de comprobante.');
            }
        });
    </script>
@endsection
