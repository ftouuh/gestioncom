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

    public function createFacture(Request $request)
    {
        $validatedData = $request->validate([
            'facture_numero' => 'required|string',
            'date_commande' => 'date',
            'societe' => 'required|string',
            'ice' => 'required|string',
            'products' => 'required|array',
            'mode_reglement' => 'required|string',
            'versement' => 'numeric',
            'reste' => 'numeric',
            'saisi_par' => 'nullable|string',
            'date_facture' => 'required|date',
            'total_TTC' => 'required|numeric',
            'TVA' => 'required|numeric',
            'total_HT' => 'required|numeric',
            'str_ttc' => 'required|string',
            'id_client' => 'required|integer', // Assuming id_client is an integer
          
        ]);
    
        $newFacture = Facture::create($validatedData);
        return redirect()->back();
    }

    public function updateFacture(Request $request,$id){

        
        $validatedData = $request->validate([
            'facture_numero' => 'required|string',
            'date_commande' => 'date',
            'societe' => 'required|string',
            'ice' => 'required|string',
            'products' => 'required|array',
            'mode_reglement' => 'required|string',
            'versement' => 'numeric',
            'reste' => 'numeric',
            'saisi_par' => 'nullable|string',
            'date_facture' => 'required|nullable|date',
            'total_TTC' => 'required|numeric',
            'TVA' => 'required|nullable|numeric',
            'total_HT' => 'required|nullable|numeric',
            'str_ttc' => 'required|nullable|string',
            'id_client' => 'required|integer', // Assuming id_client is an integer
          
        ]);
        
            $facture = Facture::findOrFail($id);
            $facture->update($validatedData);
            return redirect()->back();
        
        
    }

    public function deleteFacture($id){
        $facture = Facture::findOrFail($id);
        $facture->delete();
        return redirect()->back();
    }
}
