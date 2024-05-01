<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'phoneNumber' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
<<<<<<< HEAD
        ]);

        $user = User::create([
            'username'=>$request->username,
=======
            ]);

        $user = User::create([
            'username' => $request->username,
>>>>>>> 5fe0c370ca96f2c50299094abe1b131c54036df6
            'nom' => $request->nom,
            'prenom'=>$request->prenom , 
            'phoneNumber'=>$request->phoneNumber,
            'password' => Hash::make($request->password),
<<<<<<< HEAD

=======
>>>>>>> 5fe0c370ca96f2c50299094abe1b131c54036df6
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('admin.dashboard', absolute: false));
    }
}
