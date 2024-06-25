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
        $klant = Klant::with('voedselpakketten.products')->find($id);
        $voedselpakketten = VoedselPakket::all();
        $products = Product::all(); // Fetch all products

        return view('voedselpakket.edit', compact('klant', 'voedselpakketten', 'products'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'klant_id' => 'required|exists:klant,id',
            'datum_uitgegeven' => 'required|date',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        // Find the Klant by ID
        $klant = Klant::findOrFail($request->klant_id);

        // Delete existing VoedselPakket entries for the given klant_id
        VoedselPakket::where('klant_id', $request->klant_id)->delete();

        // Iterate through each product and create a new VoedselPakket entry
        foreach ($request->products as $index => $product_id) {
            $voedselpakket = new VoedselPakket();
            $voedselpakket->datumUitgifte = $request->datum_uitgegeven;
            $voedselpakket->datumSamenstelling = now(); // Assuming this is the current date/time
            $voedselpakket->klant_id = $request->klant_id;
            $voedselpakket->product_id = $product_id;
            $voedselpakket->quantity = $request->quantities[$index];
            $voedselpakket->save();
        }

        // Update the has_voedselpakket field for the Klant
        $klant->has_voedselpakket = true;
        $klant->save();

        return redirect()->route('klant.index')->with('success', 'VoedselPakket updated successfully');
    }








    public function destroy($id)
    {
        // Delete all voedselpakketten for the klant

        VoedselPakket::where('klant_id', $id)->delete();
        return redirect()->route('klant.index');
    }
}
