<?php

namespace App\Http\Controllers;

use App\Models\klant;
use App\Models\VoedselPakket;

use Illuminate\Http\Request;

class KlantenController extends Controller
{
    public function index()
    {

        $klant = klant::all();
        return view('klant.index', compact('klant'));
    }

    public function show($id)
    {
        $klant = Klant::with('voedselpakketten.products')->find($id);

        return view('klant.show', compact('klant'));
    }
}
