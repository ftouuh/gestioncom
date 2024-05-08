<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use App\Models\Facture;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{

    public function pdf()
    {
        $f = Facture::findOrFail(1)->toArray();
        return view('facturePDF',compact('f'));
    }
    
    public function FgeneratePDF($id)
    {
        $f = Facture::findOrFail($id)->toArray();

        $pdf = PDF::loadView('facturePDF', compact('f'));
        return $pdf->download($f['facture_numero'] . '.pdf');
    }

    public function DgeneratePDF($id)
    {
        $d = Devis::findOrFail($id)->toArray();

        $pdf = PDF::loadView('devisPDF', compact('d'));
        return $pdf->download($d['devis_numero'] . '.pdf');
    }


}