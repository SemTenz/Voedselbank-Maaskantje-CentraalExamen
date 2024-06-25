<?php

namespace App\Http\Controllers;

use App\Models\VoedselPakket;

use Illuminate\Http\Request;
use App\Models\Klant;
use App\Models\Product;

class VoedselPakketController extends Controller
{
    public function index()
    {
        $voedselpakketten = VoedselPakket::all();


        return view('voedselpakket.index', compact('voedselpakketten'));
    }

    public function create($klant_id)
    {
        $klant = Klant::findOrFail($klant_id);
        $products = Product::all();


        return view('voedselpakket.create', compact('klant', 'products'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'klant_id' => 'required|exists:klant,id',
            'datum_uitgegeven' => 'required|date',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        $klant = Klant::find($request->klant_id);

        foreach ($request->products as $index => $product_id) {
            $voedselpakket = new VoedselPakket();
            $voedselpakket->datumUitgifte = $request->datum_uitgegeven;
            $voedselpakket->datumSamenstelling = now();
            $voedselpakket->klant_id = $request->klant_id;
            $voedselpakket->product_id = $product_id;
            $voedselpakket->quantity = $request->quantities[$index];
            $voedselpakket->save();
        }

        // Update the has_voedselpakket field
        $klant->has_voedselpakket = true;
        $klant->save();

        return redirect()->route('klant.index', $klant)->with('success', 'VoedselPakket successfully created');
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
        // Delete all voedselpakketten for the klant
        VoedselPakket::where('klant_id', $id)->delete();

        return redirect()->route('klant.index');
    }
}
