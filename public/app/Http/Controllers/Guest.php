<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Guest extends Controller
{
    public function inscrire()
    {
        return inertia("Guest/Inscrire");
    }
    public function connexion()
    {
        return inertia("Guest/Connexion");
    }
}
