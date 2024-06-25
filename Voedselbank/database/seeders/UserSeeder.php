<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gebruiker 'directie'
        User::firstOrCreate(
            ['email' => 'directie@gmail.com'],
            [
                'username' => 'directie',
                'email' => 'directie@gmail.com',
                'password' => bcrypt('directie'),
                'usertype' => 'directie'
            ]
        );

        // Gebruiker 'magazijnmedewerker'
        User::firstOrCreate(
            ['email' => 'medewerker@gmail.com'],
            [
                'username' => 'magazijnmedewerker',
                'email' => 'medewerker@gmail.com',
                'password' => bcrypt('medewerker'),
                'usertype' => 'magazijnmedewerker'
            ]
        );

        // Gebruiker 'vrijwilliger'
        User::firstOrCreate(
            ['email' => 'vrijwilliger@gmail.com'],
            [
                'username' => 'vrijwilliger',
                'email' => 'vrijwilliger@gmail.com',
                'password' => bcrypt('vrijwilliger'),
                'usertype' => 'vrijwilliger'
            ]
        );

        // Gebruiker 'user'
        User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user123'),
                'usertype' => 'user'
            ]
        );
    }
}
