<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Allergie; // Using the Allergy model
use Illuminate\Support\Facades\Log;

class AllergieController extends Controller
{

    public function index(Request $request)
    {
        try {
            $query = Allergie::query();

            // Initialize sort variables
            $sort_by = $request->input('sort_by', 'default_column_name'); // Replace 'default_column_name' with your default sort column
            $sort_order = $request->input('sort_order', 'asc'); // Default sort order

            if ($request->has('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            // Apply sorting if $sort_by is a valid column name
            if (in_array($sort_by, ['name', 'another_column'])) { // Add or remove column names as needed
                $query->orderBy($sort_by, $sort_order);
            }

            if ($request->has('name') && trim($request->name) == '') {
                return redirect()->route('allergie.index')->withErrors(['name' => 'Vul a.u.b dit veld in!']);
            }

            $allergies = $query->get(); // Consider using paginate() for large datasets
            return view('allergie.index', compact('allergies', 'sort_by', 'sort_order'));
        } catch (\Exception $e) {
            Log::error($e->getMessage()); // Log the error for debugging
            session()->flash('error', 'Er is een onverwachte fout opgetreden bij het laden van de allergiegegevens.');
            return view('allergie.index', ['allergies' => collect([]), 'sort_by' => 'name', 'sort_order' => 'asc']);
        }
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

        $allergie = new Allergie();
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
        $allergie = Allergie::findOrFail($id);
        return view('allergie.edit', compact('allergie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $allergie = Allergie::findOrFail($id);
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
            $allergie = Allergie::findOrFail($id);
            $allergie->delete();
            session()->flash('success', 'Allergie succesvol verwijderd!');
        } catch (\Exception $e) {
            session()->flash('error', 'Er is een onverwachte fout opgetreden.');
        }
        return redirect()->route('allergie.index');
    }
}
