<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allergie');
    }
};
