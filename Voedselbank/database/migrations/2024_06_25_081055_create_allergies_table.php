<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('allergie', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Assuming you want a 'name' column for the allergy name
            $table->timestamps(); // Laravel default timestamps
});

// Voeg optionele allergieën toe
    DB::table('allergie')->insert([
    ['name' => 'Geen varkensvlees'],
    ['name' => 'Allergisch voor gluten, pindas, schaaldieren, hazelnoten, lactose, anders'],
    ['name' => 'Veganistisch'],
    ['name' => 'Vegatarisch'],
]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergie');
    }
};
