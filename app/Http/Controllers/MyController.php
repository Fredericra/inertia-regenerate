<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MyController extends Controller
{
    public function inscrire()
    {
        return inertia("Guest/Inscrire");
    }
    public function connexion()
    {
        return inertia("Guest/Connexion");
    }
    public function compte()
    {
        return inertia("Admin/Compte");
    }
    public function store_connexion(Request $request)
    {
        $request->validate([
            "email"=>"required|email|exists:admins",
            "password"=>"required"
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            return to_route("compte");
        }
        else{
            if(!Admin::where("email",$request->email)->first())
            {

            }
            else{
                return back()->withErrors(["password"=>"mots de pass inccorect"]);
            }
        }
    } 
    public function store_inscrire(Request $request)
    {
    
        $request->validate([
            "pseudo"=>"required|unique:admins",
            "email"=>"required|email|unique:admins",
            "password"=>["required","min:7","max:15",Password::min(8)->letters()->numbers()->mixedCase()],
            "confirm"=>"required|same:password"
        ]);
        $client = Admin::create([
            "pseudo"=>$request->pseudo,
            "email"=>$request->email,
            "password"=>Hash::make($request->password)
        ]);
        Auth::login($client);
        return to_route("compte");
    }
    public function sortie($user)
    {
        Auth::logout($user);
        return to_route("connexion");
    }
}
