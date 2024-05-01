<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    public function index()
    {
        return view();
    }
    public function getDevis(){
        $Deviss = Devis::All();
        return view('',compact('views'));
    }

    public function createDevis(Request $request)
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

        $newDevis = Devis::create($validatedData);
        return redirect()->back();
    }

    public function updateDevis(Request $request,$id){

        
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
        
            $Devis = Devis::findOrFail($id);
            $Devis->update($validatedData);
            return redirect()->back();
        
        
    }

    public function deleteDevis($id){
        $Devis = Devis::findOrFail($id);
        $Devis->delete();
        return redirect()->back();
    }
}
