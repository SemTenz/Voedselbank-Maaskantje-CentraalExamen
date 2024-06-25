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

        return redirect()->route('allergie.index')->with('success', 'Allergie added successfully');
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

        $allergie = Allergy::findOrFail($id);
        $allergie->name = $request->name;
        $allergie->save();

        return redirect()->route('allergie.index')->with('success', 'Allergie updated successfully');
    }

    public function destroy($id)
    {
        $allergie = Allergy::findOrFail($id);
        $allergie->delete();

        return redirect()->route('allergie.index')->with('success', 'Allergie deleted successfully');
    }
}
