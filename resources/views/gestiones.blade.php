@extends('template')

@section('content')
<div class="m-auto">
  <div class="flex flex-col justify-center gap-10 items-center px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white m-10 lg:m-16">
    <h1 class="text-xl lg:text-2xl font-semibold text-center"> Seleciona algun tipo de gestion</h1>
    <div class="flex flex-col justify-center items-center gap-4">
      <h4 class="font-semibold text-center text-sm lg:text-base">
        Preregistro
      </h4>
      <button class="py-2 px-3 bg-sky-500 text-white font-medium rounded-full text-sm lg:text-base">
        siguiente
      </button>
    </div>
    <div class="flex flex-col justify-center items-center gap-4">
      <h4 class="font-semibold text-center text-sm lg:text-base">
        Registro de de inscripcion
      </h4>
      <button class="py-2 px-3 bg-sky-500 text-white font-medium rounded-full text-sm lg:text-base">
        siguiente
      </button>
    </div>
  </div>
  </div>
@endsection