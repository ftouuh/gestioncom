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
        'date_commande'=>'required|Date',
        'qte'=>'required|Numeric',
        'nom_client'=>'required|String',
        'prenom_client'=>'required|String',
        'ref_p'=>'required|String',
        'desc_p'=>'required|String',
        'mode_reglement'=>'required|String',
        'versement'=>'Numeric',
        'reste'=>'Numeric',
        'saisi_par'=>'String',
        'saisi_le'=>'Date',
        'total_TTC'=>'required|Numeric',
        'TVA'=>'Numeric',
        'total_HT'=>'Numeric',
        'id_client'=>'required|String',
        'id_produit'=>'required|String',
        ]);

        $newFacture = Facture::create($validatedData);
        return redirect()->back();
    }

    public function updateFacture(Request $request,$id){

        
        $validatedData = $request->validate([
            'date_commande'=>'required|Date',
            'qte'=>'required|Numeric',
            'nom_client'=>'required|String',
            'prenom_client'=>'required|String',
            'ref_p'=>'required|String',
            'desc_p'=>'required|String',
            'mode_reglement'=>'required|String',
            'versement'=>'Numeric',
            'reste'=>'Numeric',
            'saisi_par'=>'String',
            'saisi_le'=>'Date',
            'total_TTC'=>'required|Numeric',
            'TVA'=>'Numeric',
            'total_HT'=>'Numeric',
            'id_client'=>'required|String',
            'id_produit'=>'required|String',
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
