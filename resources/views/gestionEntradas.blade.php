@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Gestion de Entradas</h2>
            <div class="pt-10">
                <div class="flex flex-col gap-4">
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Nombre</p>
                        <input type="text" placeholder="Carne"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Carné</p>
                        <input type="text" placeholder="Carne"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                </div>
                <div class="pt-5 flex justify-center gap-5">
                    <button class="btn-secondary"><a href="{{ route('moduloDisponible') }}">anterior</a></button>
                    <button class="btn-primary">siguiente</button>
                </div>
            </div>
        </div>
    </div>
@endsection
