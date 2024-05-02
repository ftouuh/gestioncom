<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('');
    }

    public function getClients(){
        $clients = Client::All();
        return  view('admin.management.client-data',compact('clients'));
    }

    public function createClient(Request $request){
        $validatedData = $request->validate([
            'nom'=>'required|String|max:255',
            'prenom'=>'required|String|max:255',
            'telephone'=>'required|String|max:255',
            'address'=>'required|String|max:255',
            'email'=>'required|email|max:255'
        ]);

        $newClient =  Client::create($validatedData);
        return redirect()->back();
    }

    public function editClient(Request $request,$id){

        $client =  Client::findOrFail($id);

        $validatedData = $request->validate([
            'nom'=>'required|String|max:255',
            'prenom'=>'required|String|max:255',
            'telephone'=>'required|String|max:255',
            'address'=>'required|String|max:255',
            'email'=>'required|email|max:255'
        ]);

        $client->update($validatedData);
        return redirect()->back();
    }

    public function deleteClient($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->back();
    }


}
