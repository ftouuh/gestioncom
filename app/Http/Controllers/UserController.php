<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUsers(){
        $users = User::All();
        return view('admin.management.users-data',compact('users'));
    }

    public function createUser(Request $request){
        $validatedData= $request->validate([
            'username'=>'required|String',
            'nom'=>'required|String',
            'prenom'=>'required|String',
            'password'=>'required|String',
            'phonenumber'=>'required|String',
        ]);
        $newuser = User::create($validatedData);
        return redirect()->back();
    }

    public function updateUser(Request $request,$id){
        $validatedData= $request->validate([
            'username'=>'required|String',
            'nom'=>'required|String',
            'prenom'=>'required|String',
            'password'=>'required|String',
            'phonenumber'=>'required|String',
        ]);

        $User = User::findOrFail($id);
        $user->update($validatedData);
        return redirect()->back();
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
