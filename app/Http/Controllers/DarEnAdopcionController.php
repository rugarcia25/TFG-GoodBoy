<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DarEnAdopcionController extends Controller
{
    public function index()
    {
        return view('darenadopcion');
    }

    public function store(Request $request)
    {
        return redirect()->route('darenadopcionForm');
    }
}
