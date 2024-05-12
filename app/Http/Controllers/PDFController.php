<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Devis;
use App\Models\Facture;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function pdf()
    {
        $d = Devis::findOrFail(1)->toArray();
        return view('devisPDF', compact('d'));
    }

    public function FgeneratePDF($id)
    {
        $f = Facture::findOrFail($id)->toArray();


        $options = [
            'defaultFont' => 'Arial',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
            'isJavascriptEnabled' => true,
            'paperSize' => 'A4',
        ];

        // Create PDF instance with specified options
        $pdf = PDF::loadView('facturePDF', compact('f'), $options);
        return $pdf->download($f['facture_numero'] . '.pdf');
    }

    public function DgeneratePDF($id)
    {
        $d = Devis::findOrFail($id)->toArray();


        $options = [
            'defaultFont' => 'Arial',
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'isPhpEnabled' => true,
            'isJavascriptEnabled' => true,
            'paperSize' => 'A4',
        ];

        // Create PDF instance with specified options
        $pdf = PDF::loadView('devisPDF', compact('d'), $options);
        return $pdf->download($d['devis_numero'] . '.pdf');
    }
}
