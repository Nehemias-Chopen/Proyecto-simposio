@extends('template')

@section('content')
    <div class="m-auto">
        <div
            class="w-[20rem] lg:w-[50rem] flex flex-col gap-10 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white lg:m-16">
            <h2 class="text-xl lg:text-2xl font-semibold text-center"> Pre Registro</h2>
            <div class="flex flex-col gap-4">
                <div class="flex">
                    <p class="hidden lg:w-20 lg:flex lg:items-center">Nombre</p>
                    <input type="text" placeholder="Nombre" name="nombre"
                        class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                </div>
                <div class="flex">
                    <p class="hidden lg:w-20 lg:flex lg:items-center">Carne</p>
                    <input type="text" placeholder="Carne" name="carnet"
                        class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                </div>
                <div class=" relative lg:flex">
                    <p class="hidden lg:w-20 lg:flex lg:items-center">Semestre</p>
                    <input type="text" placeholder="Semestre" name="Semestre"
                        class="w-full lg:w-60 placeholder:hidden lg:placeholder:flex lg:placeholder:text-sm lg:focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                </div>
                <div class="flex">
                    <p class="hidden lg:w-20 lg:flex lg:items-center">Telefono</p>
                    <input type="text" placeholder="Telefono"
                        class="w-full lg:w-60 placeholder:text-sm focus:outline-none bg-slate-200 py-2 px-3 rounded-full">
                </div>
                @foreach ($simposio as $simposio)
                    <div class="flex lg:py-5 gap-5 lg:gap-10">
                        <span class="font-bold">Inscripcion</span>
                        <span>Q.{{ $simposio->costo }}</span>
                    </div>
                @endforeach
                <div class="flex flex-col lg:flex-row gap-5 lg:gap-10">
                    <span class="">Seleccione la talla de la playera</span>
                    <select name="" id=""
                        class="py-2 px-3 rounded-full bg-slate-200 w-20 text-sm font-bold">
                        <option value="">S</option>
                        <option value="">M</option>
                        <option value="">L</option>
                    </select>
                </div>

                <div class="flex w-full flex-col lg:flex-row gap-5 lg:flex lg:justify-between lg:items-end">
                    <div>
                        <h3 class="font-bold text-lg">Añade suavenirs</h3>
                        @foreach ($suvenir as $suvenir)
                            <div>
                                <input type="checkbox" name="" id="" class="accent-sky-900">
                                <span class="font-bold">{{ $suvenir->nombre }}</span>
                                <span>+ Q.{{ $suvenir->precio }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="pt-5 flex justify-center lg:justify-end gap-5">
                        <button
                            class="border border-slate-800 py-2 px-3 rounded-full text-sm font-bold active:bg-slate-800 hover:bg-slate-500 hover:text-white"><a
                                href="{{ route('gestiones') }}">anterior</a></button>
                       <a href="{{ route('generarPDF') }}" class="py-2 px-3 rounded-full bg-sky-900 text-white text-sm font-bold active:bg-sky-950 hover:bg-sky-700 hover:text-white">
    siguiente
</a>

                    </div>
                </div>

            </div>
        </div>
    @endsection
