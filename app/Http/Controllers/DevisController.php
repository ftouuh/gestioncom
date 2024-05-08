<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;

class devisController extends Controller
{
    public function getDevis(){
        $devis = Devis::All();
        $clients = Client::All();
        $products = Product::All();
        return view('admin.management.devis-data',compact('devis','clients','products'));
    }

    
    public function createDevis(Request $request)
    {
        
        $validatedData = $request->validate([
            'devis_numero' => 'required|string',
            'date_commande' => 'date',
            'societe' => 'required|string',
            'ice' => 'required|string',
            'products' => 'required',
            'versement' => 'numeric',
            'reste' => 'numeric',
            'saisi_par' => 'nullable|string',
            'date_devis' => 'required|date',
            'total_TTC' => 'required|numeric',
            'TVA' => 'required|numeric',
            'total_HT' => 'required|numeric',
            'id_client' => 'required|numeric',
        ]);
        
        $newdevis = Devis::create($validatedData);
    }
        

    

    public function deletedevis($id){
        $devis = Devis::findOrFail($id);
        $devis->delete();
    }
}
