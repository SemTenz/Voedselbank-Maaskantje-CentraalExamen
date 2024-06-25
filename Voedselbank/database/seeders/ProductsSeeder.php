<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Allergie;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        // Haal alle categorieën en allergieën op
        $categories = Categorie::all();
        $allergies = Allergie::all();

        // Maak 50 producten aan
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'naam' => 'Product ' . ($i + 1),
                'streepjescode' => $this->generateRandomNumericString(7),
                'allergie_id' => $allergies->random()->id,
                'categorie_id' => $categories->random()->id,
                'aantal' => rand(1, 100),
            ]);
        }
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
}