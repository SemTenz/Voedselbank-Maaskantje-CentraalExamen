<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeveranciersTableSeeder extends Seeder
{
    public function run()
    {
        // Verwijder bestaande gegevens om duplicaten te voorkomen
        DB::table('leveranciers')->truncate();

        // Voorbeeld testgegevens
        $leveranciers = [
            [
                'bedrijfsnaam' => 'Voorbeeld Leverancier 1',
                'adres' => 'Voorbeeldstraat 1',
                'contactpersoon_naam' => 'Jan Jansen',
                'contactpersoon_email' => 'jan@example.com',
                'telefoonnummer' => '0123456789',
                'eerstvolgende_levering' => Carbon::now()->addDays(7), // Voegt 7 dagen toe aan huidige datum/tijd
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'bedrijfsnaam' => 'Voorbeeld Leverancier 2',
                'adres' => 'Testlaan 2',
                'contactpersoon_naam' => 'Piet Pietersen',
                'contactpersoon_email' => 'piet@example.com',
                'telefoonnummer' => '0987654321',
                'eerstvolgende_levering' => Carbon::now()->addDays(14), // Voegt 14 dagen toe aan huidige datum/tijd
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Voeg hier meer testgegevens toe indien gewenst
        ];

        // Voeg de gegevens toe aan de database
        DB::table('leveranciers')->insert($leveranciers);
    }
}
