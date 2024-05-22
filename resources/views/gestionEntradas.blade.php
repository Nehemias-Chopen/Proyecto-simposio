@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Gestion de Entradas</h2>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="pt-2">
                <form method="POST" action="{{ route('comprobarAsistencia') }}">
                    @csrf
                    <div class="flex flex-col gap-4">
                        <div class="flex">
                            <p class="hidden lg:w-20 lg:flex lg:items-center">Carnet o No. Boleta</p>
                            <input type="text" placeholder="Carnet o No. Boleta" name="comprobar" required
                                class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                        </div>
                    </div>
                    <div class="pt-5 flex justify-center gap-5">
                        <button class="btn-secondary"><a href="{{ route('moduloDisponible') }}">anterior</a></button>
                        <button type="submit" class="btn-primary">siguiente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
