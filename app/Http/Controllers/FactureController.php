<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use App\Models\Product;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        return view();
    }
    public function getFacture(){
        $factures = Facture::All();
        $clients = Client::All();
        $products = Product::All();
        return view('admin.management.facture-data',compact('factures','clients','products'));
    }

    
    public function test(Request $request)
    {
        
        $validatedData = $request->validate([
            'facture_numero' => 'required|numeric',
            'date_commande' => 'date',
            'societe' => 'required|string',
            'ice' => 'required|string',
            'products' => 'required',
            'mode_reglement' => 'required|string',
            'versement' => 'numeric',
            'reste' => 'numeric',
            'saisi_par' => 'nullable|string',
            'date_facture' => 'required|date',
            'total_TTC' => 'required|numeric',
            'TVA' => 'required|numeric',
            'total_HT' => 'required|numeric',
            'str_ttc' => 'required|string',
            'id_client' => 'required|numeric',
        ]);
        
        $newFacture = Facture::create($validatedData);
    }
        

    

    public function deleteFacture($id){
        $facture = Facture::findOrFail($id);
        $facture->delete();
        return redirect()->back();
    }
}
