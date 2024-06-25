<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leverancier;

class LeveranciersController extends Controller
{
    public function index()
    {
        $leveranciers = Leverancier::orderBy('eerstvolgende_levering', 'asc')->get();

        return view('leveranciers.index', compact('leveranciers'));
    }

    public function create()
    {
        return view('leveranciers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'bedrijfsnaam' => 'required',
            'adres' => 'required',
            'contactpersoon_naam' => 'required',
            'contactpersoon_email' => 'required|email',
            'telefoonnummer' => 'required',
            'eerstvolgende_levering' => 'required|date',
        ]);

        Leverancier::create($validatedData);

        return redirect()->route('leveranciers.index')->with('success', 'Leverancier is toegevoegd.');
    }

    public function show(Leverancier $leverancier)
    {
        return view('leveranciers.show', compact('leverancier'));
    }

    public function edit(Leverancier $leverancier)
    {
        return view('leveranciers.edit', compact('leverancier'));
    }

    public function update(Request $request, Leverancier $leverancier)
    {
        $validatedData = $request->validate([
            'bedrijfsnaam' => 'required',
            'adres' => 'required',
            'contactpersoon_naam' => 'required',
            'contactpersoon_email' => 'required|email',
            'telefoonnummer' => 'required',
            'eerstvolgende_levering' => 'required|date',
        ]);

        $leverancier->update($validatedData);

        return redirect()->route('leveranciers.show', $leverancier->id)->with('success', 'Leverancier is bijgewerkt.');
    }

    public function destroy(Leverancier $leverancier)
    {
        $leverancier->delete();

        return redirect()->route('leveranciers.index')->with('success', 'Leverancier is verwijderd.');
    }
}
