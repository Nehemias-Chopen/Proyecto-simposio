@extends('template')

@section('content')
  <div class="size-floating-property">
    <div class="w-[90%] md:w-[90%] lg:w-[100%] m-auto flex flex-col gap-10 px-4 py-6 md:p-10 lg:p-12 shadow-md rounded-xl bg-white lg:m-16">
         <h2 class="text-xl lg:text-2xl font-semibold text-center">Comprobacion de Boleta</h2>
         <div>
          <table class="bg-slate-200 w-full rounded-lg border border-slate-400 ">
            <thead>
              <tr>
                <th class="p-2">Nombre</th>
                <th class="p-2">Carne</th>
                <th class="p-2">Total</th>
                <th class="p-2">Comprobante</th>
                <th class="p-2">Telefono</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border border-slate-400">
                <td class="p-2">Alfonzo Paz Tumax</td>
                <td class="p-2">1490-18-4785</td>
                <td class="p-2">Q. 500.00</td>
                <td class="flex justify-center items-center p-2">
                  <input type="checkbox" name="" id="">
                </td>
                <td class="p-2">44060691</td>
              </tr>
               <tr class="border border-slate-400">
                <td class="p-2">Alfonzo Paz Tumax</td>
                <td class="p-2">1490-18-4785</td>
                <td class="p-2">Q. 500.00</td>
                <td class="flex justify-center items-center p-2">
                  <input type="checkbox" name="" id="">
                </td>
                <td class="p-2">44060691</td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
  </div>
@endsection