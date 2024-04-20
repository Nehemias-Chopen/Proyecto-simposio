@extends('template')

@section('content')
    <div class="size-floating-property">
      <div class="floating-background-property">
        <h2 class="text-xl lg:text-2xl font-semibold text-center">Login</h2>
        
        <div class="flex flex-col gap-5">
          <div class="flex">
            <p class="hidden lg:w-24 lg:flex lg:items-center">Carné</p>
            <input type="text" placeholder="Nombre" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
          </div>
          <div class="flex">
            <p class="hidden lg:w-24 lg:flex lg:items-center">Contraseña</p>
            <input type="text" placeholder="Nombre" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
          </div>
        </div>
        <div class="pt-5 flex justify-center lg:justify-center gap-5 lg:gap-20">
          <button class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white">anterior</button>
          <button class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">siguiente</button>
        </div>
      </div>
    </div>
@endsection