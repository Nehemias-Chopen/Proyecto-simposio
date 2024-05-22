@extends('template')

@section('content')
    <div class="ml-auto mr-4 mt-4">
        <a href="{{ route('admins') }}">
            <img src="https://images.freeimages.com/fic/images/icons/2711/free_icons_for_windows8_metro/512/login.png"
                alt="Logo Login" class="m-auto w-10 h-10">
        </a>
    </div>
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h1 class="text-xl lg:text-2xl font-semibold text-center"> Seleciona algun tipo de gestion</h1>
            <div class="flex flex-col justify-center items-center gap-4">
                <h4 class="font-semibold text-center text-sm lg:text-base">
                    Pre Registro
                </h4>
                <button class="py-2 px-3 bg-sky-500 text-white font-medium rounded-full text-sm lg:text-base">
                    <a href="{{ route('preRegistro') }}"> siguiente </a>
                </button>
            </div>
            <div class="flex flex-col justify-center items-center gap-4">
                <h4 class="font-semibold text-center text-sm lg:text-base">
                    Completar Registro
                </h4>
                <button class="py-2 px-3 bg-sky-500 text-white font-medium rounded-full text-sm lg:text-base">
                    <a href="{{ route('registroInscripcion') }}"> siguiente </a>
                </button>
            </div>
        </div>
    </div>
@endsection
