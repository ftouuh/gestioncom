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
    public function getClientsById($id){
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    public function createClient(Request $request){
        $validatedData = $request->validate([
            'nom'=>'required|String|max:255',
            'prenom'=>'required|String|max:255',
            'telephone'=>'nullable|String|max:255',
            'societe'=>'required|String|max:255',
            'ice'=>'required|String|max:255',
            'address'=>'nullable|String|max:255',
            'email'=>'nullable|email|max:255'
        ]);

        $newClient =  Client::create($validatedData);
        return redirect()->back();
    }

    public function editClient(Request $request,$id){

       

        $validatedData = $request->validate([
            'nom'=>'required|String|max:255',
            'prenom'=>'required|String|max:255',
            'telephone'=>'nullable|String|max:255',
            'societe'=>'required|String|max:255',
            'ice'=>'required|String|max:255',
            'address'=>'nullable|String|max:255',
            'email'=>'nullable|email|max:255'
        ]);
        $client =  Client::findOrFail($id);
        $client->update($validatedData);
        return redirect()->back();
    }

    public function deleteClient($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->back();
    }


}
