<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAllergiesTable extends Migration
{
    public function up()
    {
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Voeg optionele allergieën toe
        DB::table('allergies')->insert([
            ['name' => 'Geen varkensvlees'],
            ['name' => 'Allergisch voor gluten, pindas, schaaldieren, hazelnoten, lactose, anders'],
            ['name' => 'Veganistisch'],
            ['name' => 'Vegatarisch'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('allergies');
    }
}
