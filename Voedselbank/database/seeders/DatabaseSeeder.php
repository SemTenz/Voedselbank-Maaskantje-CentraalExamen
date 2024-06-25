<?php

namespace Database\Seeders;

use App\Models\Klant;
use App\Models\Product;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Contracts\Auth\Factory;
use Illuminate\Database\Seeder;
use factories\UserFactory;



class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            LeveranciersTableSeeder::class,
        ]);
        Klant::factory(50)->create();
        Product::factory(20)->create();
    }
}
