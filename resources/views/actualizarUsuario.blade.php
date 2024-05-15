@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Actualizar Usuario</h2>
            <p class="text-xs lg:text-sm font-semibold text-center text-gray-600">* Dejar en blanco para no
                modificar
                la contraseña
            </p>
            <form method="POST" action="{{ route('actualizarUsuario', $user) }}">
                @csrf @method('PUT')
                <div class="flex flex-col gap-5">
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Nombre</p>
                        <input type="text" value="{{ $user->name }}" name="name"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Email</p>
                        <input type="email" value="{{ $user->email }}" name="email"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Contraseña</p>
                        <input type="password" placeholder="Contraseña" name="password"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full"
                            id="password-field">
                        <button type="button"
                            class="py-2 px-2 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white"
                            onclick="togglePasswordField('password-field')">
                            <img src="{{ asset('/img/visualizar.png') }}" class="w-5" alt=""
                                style="filter: invert(100%);">
                        </button>
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Confirmar Contraseña</p>
                        <input type="password" placeholder="Confirmar Contraseña" name="password_confirm"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full"
                            id="confirm-password-field">
                        <button type="button"
                            class="py-2 px-2 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white"
                            onclick="togglePasswordField('confirm-password-field')">
                            <img src="{{ asset('/img/visualizar.png') }}" class="w-5" alt=""
                                style="filter: invert(100%);">
                        </button>
                    </div>
                </div>
                <div class="pt-5 flex justify-center lg:justify-center gap-5 lg:gap-20">
                    <button
                        class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                            href="{{ route('administrador') }}">Regresar</a></button>
                    <input type="submit"
                        class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white"
                        value="Actualizar">
                </div>
            </form>
        </div>
    </div>
@endsection
