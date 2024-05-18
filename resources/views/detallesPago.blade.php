@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Completar Registro</h2>
            @foreach ($inscripciones as $inscripcion)
                <form method="POST" action="{{ route('actualizarInscripcion', $inscripcion->no_boleta) }}"
                    enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="flex flex-col gap-5">
                        <div class="flex">
                            <p class="hidden lg:w-20 lg:flex lg:items-center">Nombre</p>
                            <input type="text" value="{{ $inscripcion->alumnos->nombre }}" name="nombres"
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
                        <div class="flex">
                            <p class="hidden lg:w-20 lg:flex lg:items-center mr-8">Comprobante</p>
                            <input multiple type="file" name="comprobante" id="input-file-type" class="hidden">
                            <label for="input-file-type"
                                class="py-3 px-3 font-bold bg-sky-900 text-white rounded-xl">Seleccionar
                                archivo</label>
                        </div>


                        <div class="pt-5 flex justify-center lg:justify-center gap-5 lg:gap-20">
                            <button
                                class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                                    href="{{ route('gestiones') }}">anterior</a></button>
                            <button
                                class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">Subir
                                Comprobante</button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
