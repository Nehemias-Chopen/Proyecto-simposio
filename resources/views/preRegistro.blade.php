@extends('template')

@section('content')
<div class="m-auto">
  <div class="w-[20rem] lg:w-[50rem] flex flex-col gap-10 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white m-10 lg:m-16">
    <h2 class="text-xl lg:text-2xl font-semibold text-center"> Seleciona algun tipo de gestion</h2>
    <div class="flex flex-col gap-4">
      <div class="flex">
        <p class="hidden lg:w-20 lg:flex lg:items-center">Nombre</p>
        <input type="text" placeholder="Nombre" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
      </div>
      <div class="flex">
        <p class="hidden lg:w-20 lg:flex lg:items-center">Carne</p>
        <input type="text" placeholder="Carne" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
      </div>
      <div class=" relative lg:flex">
        <p class="hidden lg:w-20 lg:flex lg:items-center">Semestre</p>
        <input type="text" placeholder="Semestre" class="w-full lg:w-60 placeholder:hidden lg:placeholder:flex lg:placeholder:text-sm lg:focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
      </div>
      <div class="flex">
        <p class="hidden lg:w-20 lg:flex lg:items-center">Numero</p>
        <input type="text" placeholder="Numero" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
      </div>

      <div class="flex lg:py-5 gap-5 lg:gap-10">
        <p class="hidden lg:w-20 lg:flex lg:items-center">Inscripcion</p>
        <input type="text" placeholder="Inscripcion" class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
      </div>

      <div class="flex flex-col lg:flex-row gap-5 lg:gap-10">
        <span class="">Seleccione la talla de la playera</span>
        <select name="" id="" class="py-2 px-3 rounded-full bg-slate-200 w-20 text-sm font-bold">
          <option value="">S</option>
          <option value="">M</option>
          <option value="">L</option>
        </select>
      </div>
      
      <div class="flex w-full flex-col lg:flex-row gap-5 lg:flex lg:justify-between lg:items-end">
        <div>
          <h3 class="font-bold text-lg">Añade suavenirs</h3>
          
          <div>
            <span class="font-bold">gorra</span>
            <input type="checkbox" name="" id="" class="accent-sky-900">
            <span>+Q.50.00</span>
          </div>
          <div>
            <span class="font-bold">pachon</span>
            <input type="checkbox" name="" id="" class="accent-sky-900">
            <span>+Q.75.00</span>
          </div>
          <div>
            <span class="font-bold">pin</span>
            <input type="checkbox" name="" id="" class="accent-sky-900">
            <span>+Q.80.00</span>
          </div>
        </div>

        <div class="flex gap-7 lg:gap-4">
          <span class="font-bold">
            subtotal
          </span>
          <div class="">
            <span class="w-16 border border-black py-2 px-3 rounded-full">
                Q. 380.00
            </span>
          </div>
        </div>
      </div>

      <div class="pt-5 flex justify-center lg:justify-end gap-5">
        <button class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white">anterior</button>
        <button class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">siguiente</button>
      </div>
    </div>
 
  </div>
  </div>
@endsection