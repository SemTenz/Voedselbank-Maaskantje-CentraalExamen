<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergy; // Using the Allergy model

class AllergieController extends Controller
{
    public function index()
    {
        // Fetch all allergies from the database using the correct model
        $allergies = Allergy::all();
        
        // Pass the allergies data to the view
        return view('allergie.index', ['allergies' => $allergies]);
    }
    
    public function create()
    {
        return view('allergie.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $allergie = new Allergy();
        $allergie->name = $request->name;

        $allergie->save();

        try {
            $allergie->save();
            session()->flash('success', 'Allergie succesvol toegevoegd!');
        } catch (\Exception $e) {
            session()->flash('error', 'Er is een onverwachte fout opgetreden.');
        }

        session()->flash('success', 'Allergie succesvol toegevoegd!');
        return redirect()->route('allergie.index');
    }

    public function edit($id)
    {
        $allergie = Allergy::findOrFail($id);
        return view('allergie.edit', compact('allergie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $allergie = Allergy::findOrFail($id);
            $allergie->name = $request->name;
            $allergie->save();
            session()->flash('success', 'Allergie succesvol bijgewerkt!');
        } catch (\Exception $e) {
            session()->flash('error', 'Er is een onverwachte fout opgetreden.');
        }
        return redirect()->route('allergie.index');
    }

    public function destroy($id)
    {
        try {
            $allergie = Allergy::findOrFail($id);
            $allergie->delete();
            session()->flash('success', 'Allergie succesvol verwijderd!');
        } catch (\Exception $e) {
            session()->flash('error', 'Er is een onverwachte fout opgetreden.');
        }
        return redirect()->route('allergie.index');
            }
}
