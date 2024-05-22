@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <div>
                @auth
                    <form style="display: inline" action="/logout" method="POST">
                        @csrf
                        <a href="#" onclick="this.closest('form').submit()" class="btn-secondary">Logout</a>
                    </form>
                @endauth
            </div>

            <div class="flex flex-col gap-3">
                <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
                    <p class="flex  lg:items-center">Simposio</p>
                    <a href="{{ route('simposio', 1) }}" class="btn-primary"> Siguiente </a>
                </div>

                <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
                    <p class="flex  lg:items-center">Suvenires</p>
                    <a href="{{ route('suvenires') }}" class="btn-primary"> Siguiente </a>
                </div>

                <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
                    <p class="flex  lg:items-center">Gestion de Entrada </p>
                    <a href="{{ route('gestionEntradas') }}" class="btn-primary"> Siguiente </a>
                </div>
                <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
                    <p class="flex lg:items-center">Comprobacion de Boletos</p>
                    <a href="{{ route('comprobarBoleta') }}" class="btn-primary"> Siguiente </a>
                </div>
                <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
                    <p class="flex lg:items-center">Seminaristas</p>
                    <a href="{{ route('seminaristas') }}" class="btn-primary"> Siguiente </a>
                </div>
                <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
                    <p class="flex lg:items-center">Super Usuario</p>
                    <a href="{{ route('administrador') }}" class="btn-primary"> Siguiente </a>
                </div>
            </div>
        </div>
    </div>
@endsection
