<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Http\Controllers\HomeController;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(['username' => 'directie', 'email' => 'directie@gmail.com', 'password' => bcrypt('directie'), 'usertype' => 'directie']);
        User::create(['username' => 'magazijnmedewerker', 'email' => 'medewerker@gmail.com', 'password' => bcrypt('medewerker'), 'usertype' => 'magazijnmedewerker']);
        User::create(['username' => 'vrijwilliger', 'email' => 'vrijwilliger@gmail.com', 'password' => bcrypt('vrijwilliger'), 'usertype' => 'vrijwilliger']);
        User::create(['username' => 'user', 'email' => 'user@gmail.com', 'password' => bcrypt('user123'), 'usertype' => 'user']);
    }
}
