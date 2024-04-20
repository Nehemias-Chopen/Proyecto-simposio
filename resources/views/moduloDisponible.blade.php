@extends('template')

@section('content')
  <div class="size-floating-property">
      <div class="floating-background-property">
        <div>
          <button class="btn-secondary">Volver</button>
        </div>

        <div class="flex flex-col gap-3">
          <div class="flex gap-2 flex-col lg:flex-row justify-between">
            <p class="flex  lg:items-center">Gestion de Entrada</p>
            <button class="btn-primary"> Siguiente </button>
          </div>
          <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
            <p class="flex lg:items-center">Coprobacion de Boletos</p>
            <button class="btn-primary"> Siguiente </button>
          </div>
          <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
            <p class="flex lg:items-center">Inscripcion de Seminaristas</p>
            <button class="btn-primary"> Siguiente </button>
          </div>
          <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
            <p class="flex lg:items-center">Super Usuario</p>
            <button class="btn-primary"> Siguiente </button>
          </div>
        </div>
      </div>    
  </div>    
@endsection