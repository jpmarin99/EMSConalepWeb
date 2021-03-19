<?php

namespace App\Http\Controllers;
use App\Aviso;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PDFmaker extends Controller
{
    public function PDFavisos(Request $request)

    {
        $avisos = Aviso:: select('*');



        $pdf = PDF::loadView('avisos.pdf');

        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Reporte.pdf',compact('avisos'));



    }
}
