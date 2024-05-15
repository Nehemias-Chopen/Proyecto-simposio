@extends('template')

@section('content')
    <div class="size-floating-property">
        <div class="floating-background-property">
            <h2 class="text-xl lg:text-2xl font-semibold text-center">Login</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    <h1 class="text-center">{{ session('success') }}
                    </h1>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="flex flex-col gap-5">
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Email</p>
                        <input type="email" placeholder="email " name="email"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <span class="text-center"
                                style="background-color: #ff0000; color: #ffffff; border: 2px solid #ff0000; border-radius: 10px; padding: 5px;">
                                {{ 'no ingreso ningun usuario' }}
                            </span>
                        </div>
                    @endif
                    <div class="flex">
                        <p class="hidden lg:w-24 lg:flex lg:items-center">Contraseña</p>
                        <input type="password" placeholder="password" name="password"
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full"
                            id="password-field">
                        <button type="button"
                            class="py-2 px-2 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white"
                            onclick="togglePasswordField('password-field')">
                            <img src="{{ asset('/img/visualizar.png') }}" class="w-5" alt=""
                                style="filter: invert(100%);">
                        </button>
                    </div>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <span class="text-center"
                                style="background-color: #ff0000; color: #ffffff; border: 2px solid #ff0000; border-radius: 10px; padding: 5px;">
                                {{ 'no ingreso ninguna contraseña' }}
                            </span>
                        </div>
                    @endif
                </div>
                <div class="pt-5 flex justify-center lg:justify-center gap-5 lg:gap-20">
                    <button
                        class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                            href="{{ route('gestiones') }}">Cancelar</a></button>
                    <button type="submit"
                        class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">Login</button>
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
    </script>
@endsection
