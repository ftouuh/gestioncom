<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function index()
    {
        return view();
    }
    public function getFacture(){
        $factures = Facture::All();
        return view('admin.management.facture-data',compact('factures'));
    }

    public function createFacture(Request $request)
    {
        $validatedData = $request->validate([
        'date_commande'=>'required|Date',
        'nom_client'=>'required|String',
        'prenom_client'=>'required|String',
        'versement'=>'Number',
        'reste'=>'Number',
        'saisi_par'=>'String',
        'saisi_le'=>'Date',
        'total_TTC'=>'required|Number',

        ]);

        $newFacture = Facture::create($validatedData);
        return redirect()->back();
    }

    public function updateFacture(Request $request,$id){

        
        $validatedData = $request->validate([
            'date_commande'=>'required|Date',
            'nom_client'=>'required|String',
            'prenom_client'=>'required|String',
            'versement'=>'numeric',
            'reste'=>'numeric',
            'saisi_par'=>'String',
            'saisi_le'=>'Date',
            'total_TTC'=>'required|numeric',
    
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
