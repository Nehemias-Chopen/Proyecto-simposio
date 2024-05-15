@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Registrar Usuario</h2>
            @if (session('success'))
                <div id="successMessage" class="bg-green-200 text-green-800 p-3 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('registro') }}">
                @csrf
                <div class="flex flex-col gap-5">
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Nombre</p>
                        <input type="text" placeholder="nombre " name="name"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Email</p>
                        <input type="email" placeholder="email" name="email"
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
                        <input type="password" placeholder="Confirmar Contraseña " name="password_confirm"
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
                            href="{{ route('administrador') }}">Registrar</a></button>
                    <input type="submit"
                        class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white"
                        value="Registrar">
                </div>
            </form>
        </div>
    </div>
    <script>
        function togglePasswordField(fieldId) {
            var field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
            } else {
                field.type = "password";
            }
        }

        setTimeout(function() {
            var element = document.getElementById('successMessage');
            if (element)
                element.style.display = 'none';
        }, 5000); // 5000 milisegundos = 5 segundos
    </script>
@endsection
