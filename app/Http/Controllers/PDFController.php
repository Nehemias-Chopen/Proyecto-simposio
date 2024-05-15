<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller

// modificar al aplicar la logica esto genera el pdf o factura 
{ public function generarPDF()
    {
        $datos = DB::table('suvenires')->get(); 
        $html = view('generarPDF', compact('datos'))->render();
    
        $pdf = new Dompdf();
        $pdf->loadHtml($html);
        $pdf->render();
    
        return $pdf->stream('documento.pdf');
    }
    
}


