<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Allergie;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Toon een lijst met alle producten.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Toon het formulier voor het maken van een nieuw product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allergies = Allergie::all();
        $categories = Categorie::all();
        return view('products.create', compact('allergies', 'categories'));
    }

    /**
     * Opslaan van een nieuw product in de database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'allergie_id' => 'nullable|exists:allergies,id',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Toon het formulier voor het bewerken van een bestaand product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $allergies = Allergie::all();
        $categories = Categorie::all();
        return view('products.edit', compact('product', 'allergies', 'categories'));
    }

    /**
     * Bijwerken van een bestaand product in de database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'naam' => 'required',
            'allergie_id' => 'nullable|exists:allergies,id',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Verwijderen van een product uit de database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
