@extends('template')

@section('content')
    <div class="m-auto">
        <div
            class="w-[20rem] lg:w-[50rem] flex flex-col gap-10 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white lg:m-16">
            <h2 class="text-xl lg:text-2xl font-semibold text-center"> Pre Registro</h2>
            <div class="flex justify-center">
                <div class="text-red-700 font-bold text-lg">
                    @error('carnet')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <form method="POST" action="{{ route('ingresarRegistro') }}">
                @csrf
                <div class="flex flex-col gap-4">
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Nombre</p>
                        <input type="text" placeholder="Nombre" name="nombre" required
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Carne</p>
                        <input type="text" placeholder="Carne" name="carnet" required
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Semestre</p>
                        <input type="text" placeholder="Semestre" name="semestre" required
                            class="w-full lg:w-60 placeholder:hidden lg:placeholder:flex lg:placeholder:text-sm lg:focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    <div class="flex">
                        <p class="hidden lg:w-20 lg:flex lg:items-center">Telefono</p>
                        <input type="text" placeholder="Telefono" name="telefono" required
                            class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                    </div>
                    @foreach ($simposio as $simposio)
                        <div class="flex lg:py-5 gap-5 lg:gap-10">
                            <span class="font-bold">Costo Inscripcion</span>
                            <span>Q. {{ $costoSimposio = $simposio->costo }}</span>
                        </div>
                        <div class="flex lg:py-5 gap-5 lg:gap-10">
                            <span class="font-bold">Suvenir:</span>
                            <span>Playera</span>
                            <select name="suvenirg" class="py-2 px-3 rounded-full bg-slate-200 text-sm font-bold" required>
                                <option value="" disabled selected>Elija una talla</option>
                                <option value="Playera talla = S">S</option>
                                <option value="Playera talla = M">M</option>
                                <option value="Playera talla = L">L</option>
                            </select>
                        </div>

                        <div class="flex w-full flex-col lg:flex-row gap-5 lg:flex lg:justify-between lg:items-end">
                            <div>
                                <h3 class="font-bold text-lg">Añade suavenirs extra</h3>
                                <p class="texto-destacado" style="color: #B80000; margin-bottom: 10px;">* agregar suvenires
                                    extra incrementa
                                    el costo</p>
                                @foreach ($suvenir as $suvenir)
                                    <div>
                                        <input type="checkbox" name="suvenir[]" class="accent-sky-900"
                                            value="{{ $suvenir->codigo }}" data-costo="{{ $suvenir->precio }}"
                                            data-nombre="{{ $suvenir->nombre }}">
                                        <span class="font-bold">{{ $suvenir->nombre }}</span>
                                        <span>+ Q.{{ $suvenir->precio }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex w-full flex-col lg:flex-row gap-5 lg:flex lg:justify-between lg:items-end">
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    // Obtener todos los checkboxes
                                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');

                                    // Escuchar el evento de cambio en cada checkbox
                                    checkboxes.forEach(function(checkbox) {
                                        checkbox.addEventListener('change', function() {
                                            // Obtener el costo del simposio asociado a este checkbox
                                            const costoSuvenirE = parseFloat(this.dataset.costo);

                                            // Obtener la suma actual
                                            let sumaTotal = parseFloat(document.getElementById('sumaTotal').textContent);
                                            // Actualizar la suma total basada en si el checkbox está marcado o no
                                            if (this.checked) {
                                                sumaTotal += costoSuvenirE;
                                            } else {
                                                sumaTotal -= costoSuvenirE;
                                            }

                                            // Actualizar el valor de la suma total en el HTML
                                            document.getElementById('sumaTotal').textContent = sumaTotal.toFixed(2);
                                            document.getElementById('sumaTotalInput').value = sumaTotal.toFixed(2);

                                        });
                                    });
                                });
                            </script>

                            <!-- Agregar un elemento para mostrar la suma total -->
                            <div><span></span></div>
                            <!-- Subtotal -->
                            <div class="flex gap-7 lg:gap-4">
                                <span class="font-bold">
                                    Costo Total: Q.
                                </span>
                                <div class="">
                                    <span id="sumaTotal" class="w-16 border border-black py-2 px-3 rounded-full">
                                        {{ $simposio->costo }}
                                    </span>
                                    <input type="hidden" name="costoTotal" id="sumaTotalInput"
                                        value="{{ $simposio->costo }}"><!--Captura del valor de la suma total-->
                                </div>
                    @endforeach
                </div>
        </div>

        <div class="pt-5 flex justify-center lg:justify-end gap-5">
            <button
                class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                    href="{{ route('gestiones') }}">anterior</a></button>
            <button
                class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white"
                >siguente</a></button> 
            </div>
    </div>
    </form>
    </div>
    </div>
@endsection
