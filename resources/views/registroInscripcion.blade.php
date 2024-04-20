@extends('template')

@section('content')
  <div class="m-auto">
    <div class="w-[80%] lg:w-[30rem] flex flex-col gap-10 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white m-10 lg:m-16">
      <h2 class="text-xl lg:text-2xl font-semibold text-center">Registro de Inscripcion</h2>
      <div class="pt-10">
        <div class="flex flex-col gap-4">
          <div class="flex">
            <p class="hidden lg:w-20 lg:flex lg:items-center">Nombre</p>
            <input type="text" placeholder="Carne" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
          </div>
          <div class="flex">
            <p class="hidden lg:w-20 lg:flex lg:items-center">Carné</p>
            <input type="text" placeholder="Carne" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
          </div>
        </div>
        <div class="pt-5 flex justify-center gap-5">
          <button class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white">anterior</button>
          <button class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">siguiente</button>
        </div>
      </div>
    </div>
  </div>
@endsection