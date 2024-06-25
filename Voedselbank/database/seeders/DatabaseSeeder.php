<?php

namespace Database\Seeders;

use App\Models\Klant;

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
        ]);
        Klant::factory(50)->create();
    }
}
