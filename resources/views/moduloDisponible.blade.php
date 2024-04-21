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
            <a href="{{ route('gestionEntradas') }}" class="btn-primary"> Siguiente </a>
          </div>
          <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
            <p class="flex lg:items-center">Coprobacion de Boletos</p>
            <a href="{{ route('comprobarBoleta') }}" class="btn-primary"> Siguiente </a>
          </div>
          <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
            <p class="flex lg:items-center">Inscripcion de Seminaristas</p>
            <a  class="btn-primary"> Siguiente </a>
          </div>
          <div class="flex gap-2 flex-col lg:flex-row pt-3 justify-between">
            <p class="flex lg:items-center">Super Usuario</p>
            <a href="{{ route('administrador') }}" class="btn-primary"> Siguiente </a>
          </div>
        </div>
      </div>    
  </div>    
@endsection