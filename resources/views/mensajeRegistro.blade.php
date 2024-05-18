@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Felicidades</h2>
            <p class="text-center mt-4 text-lg">
                Has completado tu registro. Nos pondremos en contacto contigo lo antes posible.
            </p>
            <form method="" action="">
                <div class="pt-5 flex justify-center lg:justify-center gap-5 lg:gap-20">
                    <button
                        class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white">
                        <a href="{{ route('gestiones') }}">Regresar al Inicio</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
