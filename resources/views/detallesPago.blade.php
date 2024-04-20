@extends('template')

@section('content')
    <div class="m-auto">
      <div class="w-[80%] lg:w-[30rem] flex flex-col gap-10 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white m-10 lg:m-16">
        <div class="flex">
          <p class="hidden lg:w-20 lg:flex lg:items-center">Nombre</p>
          <input type="text" placeholder="Nombre" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
        </div>
        <div class="flex">
          <p class="hidden lg:w-20 lg:flex lg:items-center">Carne</p>
          <input type="text" placeholder="Carne" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
        </div>
        <div class=" relative lg:flex">
          <p class="hidden lg:w-20 lg:flex lg:items-center">No. boleta</p>
          <input type="text" placeholder="Semestre" class="w-full lg:w-60 placeholder:hidden lg:placeholder:flex lg:placeholder:text-sm lg:focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
        </div>
        <div class="flex gap-10 items-center">
          <p class="hidden lg:w-20 lg:flex lg:items-center">Comprobante</p>
          <input multiple type="file" name="" id="input-file-type" class="hidden">
          <label for="input-file-type" class=" py-3 px-3 font-bold bg-sky-900 text-white rounded-xl" >seleccionar archivo</label>
        </div>
        <div class="flex gap-3 flex-col lg:flex-row">
          <p class="font-bold">
            completaste tu inscripcion te esperamos
          </p>
          <button class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">Confirmar</button>
        </div>
      </div>
    </div>
@endsection