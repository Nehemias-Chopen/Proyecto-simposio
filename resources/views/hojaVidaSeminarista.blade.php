@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h1 class="text-lg font-bold text-center">HOJA DE VIDA</h1>

            <h2 class="text-xl">
                <span class="font-bold">Seminarista:</span> {{ $seminarista->nombres }}, {{ $seminarista->apellidos }}
            </h2>
            <h3 class="text-xl">
                <span class="font-bold">Tema:</span> {{ $seminarista->tema }}
            </h3>
            <p class="text-justify mt-4 text-lg whitespace-pre-wrap">
                {{ $seminarista->hoja_vida }}
            </p>
            <div class="pt-5 flex justify lg:justify-center gap-5 lg:gap-20">
                <button
                    class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white">
                    <a href="{{ route('seminaristas') }}">Cerrar</a>
                </button>
            </div>
        </div>
    </div>
@endsection
