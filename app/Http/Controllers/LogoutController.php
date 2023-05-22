<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function store()
    {

        auth()->logout();

        // Devolvemos al usuario al login
        return redirect()->route('login');
    }
}
