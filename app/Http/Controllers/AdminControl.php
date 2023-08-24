<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Valiny;
use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminControl extends Controller
{
    public function admin()
    {
        return inertia("Guest/Admin");
    }
    public function store_admin(Request $request)
    {
        $request->validate([
            "email"=>"required|email|exists:admins",
            "password"=>"required"
        ]);
        if(Admin::where("email","admin@dev1234")->first() && $request->email==="admin@dev1234")
        {
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
        else{
            return back()->withErrors(["email"=>"l'email entre n'est pas email admin"]);
        }
    }
    public function ajouter(Request $request)
    {
        $request->validate([
            "cle"=>["required"],
            "reponse"=>"required|unique:questions",
            "autre"=>"required",
        ]);
        Question::create([
            "cle"=>$request->cle,
            "reponse"=>$request->reponse,
            "autre"=>$request->autre,
        ]);
    }
    public function reponse(Request $request)
    {
        $request->validate([
            "reponse"=>"required",
            "question"=>"required",
        ]);
        Valiny::create([
            "admin_id"=>$request->admin_id,
            "reponse"=>$request->reponse,
            "confirmed"=>$request->confirmed,
            "question"=>$request->question
        ]);
    }
    public function efface(Request $request)
    {

        $reponse = Valiny::findOrFail($request->id)->delete();
    }
}
