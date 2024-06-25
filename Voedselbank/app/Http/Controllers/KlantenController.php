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
    public function create()
    {
        return view('voedselpakket.create');
    }

    public function store(Request $request)
    {

        $voedselpakket = new VoedselPakket();
        $voedselpakket->datumUitgifte = now();
        $voedselpakket->datumSamenstelling = now();
        $voedselpakket->klant_id = 1;
        $voedselpakket->save();

        return redirect()->route('voedselpakket.index');
    }

    public function edit($id)
    {
        $voedselpakket = VoedselPakket::findOrFail($id);

        return view('voedselpakket.edit', compact('voedselpakket'));
    }


    public function update(Request $request, $id)
    {
        $voedselpakket = VoedselPakket::findOrFail($id);

        $voedselpakket->datumUitgifte = $request->datum_uitgegeven;
        $voedselpakket->datumSamenstelling = now();
        $voedselpakket->klant_id = 1; // Update this as needed

        $voedselpakket->save();

        return redirect()->route('voedselpakket.index');
    }


    public function destroy($id)
    {
        $voedselpakket = VoedselPakket::findOrFail($id);

        $voedselpakket->delete();

        return redirect()->route('voedselpakket.index');
    }
}
