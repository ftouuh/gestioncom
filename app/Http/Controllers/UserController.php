<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{

    public function index(){
        return view();
    }

    public function getUsers(){
        $users = User::All();
        return view('admin.management.users-data',compact('users'));

    }

    public function createUser(Request $request){
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);


        $user = User::create([
            'username' => $request->username,
            'nom' => $request->nom,
            'prenom'=>$request->prenom , 
            'phoneNumber'=>$request->phoneNumber,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));
        return redirect()->back();
    }

    public function updateUser(Request $request, $id)
{
    $validatedData = $request->validate([
        'username' => 'required|string',
        'nom' => 'required|string',
        'prenom' => 'required|string',
        'phoneNumber' => 'required|string',
    ]);

    $user = User::findOrFail($id);
    $user->update($validatedData);
    return redirect()->back();
}


    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
