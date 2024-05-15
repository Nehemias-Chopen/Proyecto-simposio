@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Actualizar Suvenir</h2>
            <form method="POST" action="{{ route('actualizarSuvenir', $suvenir) }}">
                @csrf @method('PUT')
                <div class="flex flex-col gap-5">
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Nombre</p>
                        <input type="text" value="{{ $suvenir->nombre }}" name="nombre"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Precio</p>
                        <input type="text" value="{{ $suvenir->precio }}" name="precio"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                </div>
                <div class="pt-5 flex justify-center lg:justify-center gap-5 lg:gap-20">
                    <button
                        class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                            href="{{ route('suvenires') }}">Regresar</a></button>
                    <input type="submit"
                        class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white"
                        value="Actualizar">
                </div>
            </form>
        </div>
    </div>
@endsection
