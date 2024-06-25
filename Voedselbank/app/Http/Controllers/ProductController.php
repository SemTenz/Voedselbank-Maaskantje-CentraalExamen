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
    public function index(Request $request)
    {
        // Haal alle producten op
        $productsQuery = Product::query();

        // Filter op streepjescode indien opgegeven in het zoekveld
        $barcode = $request->input('barcode');
        if ($barcode) {
            $productsQuery->where('streepjescode', 'like', '%' . $barcode . '%');
        }

        // Sorteer producten op basis van de gespecificeerde kolom (standaard op naam)
        $sort_by = $request->input('sort_by', 'naam');
        $sort_order = $request->input('sort_order', 'asc');
        if (in_array($sort_by, ['streepjescode', 'naam', 'categorie_id', 'aantal'])) {
            $productsQuery->orderBy($sort_by, $sort_order);
        }

        $products = $productsQuery->get();
        $categories = Categorie::all(); // Haal alle categorieën op
        $allergies = Allergie::all(); // Haal alle allergieën op

        return view('products.index', compact('products', 'categories', 'allergies', 'sort_by', 'sort_order'));
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
        'aantal' => 'required|integer|min:0', // Validatie voor aantal
    ]);

    // Genereer een willekeurige streepjescode bestaande uit 7 cijfers
    $streepjescode = $this->generateRandomNumericString(7);

    $product = new Product();
    $product->naam = $request->naam;
    $product->streepjescode = $streepjescode; // Automatisch gegenereerde streepjescode
    $product->allergie_id = $request->allergie_id;
    $product->categorie_id = $request->categorie_id;
    $product->aantal = $request->aantal; // Voeg aantal toe
    $product->save();

    return redirect()->route('products.index')->with('success', 'Product succesvol aangemaakt.');
}

/**
 * Genereer een willekeurige numerieke string van opgegeven lengte.
 *
 * @param int $length Lengte van de gewenste string
 * @return string Willekeurige numerieke string
 */
private function generateRandomNumericString($length)
{
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
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

        return redirect()->route('products.index')->with('success', 'Product succesvol aangepast.');
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

        return redirect()->route('products.index')->with('success', 'Product succesvol verwijderd.');
    }
}

