<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Allergie;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $allergies = Allergie::all();
        $categories = Categorie::all();
        return view('products.create', compact('allergies', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required',
            'allergie_id' => 'nullable|exists:allergies,id',
            'categorie_id' => 'nullable|exists:categories,id',
        ]);

        Product::create($request->all());

        return redirect()->route('products.create')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $allergies = Allergie::all();
        $categories = Categorie::all();
        return view('products.edit', compact('product', 'allergies', 'categories'));
    }

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

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
