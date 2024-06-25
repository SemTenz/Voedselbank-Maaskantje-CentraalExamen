<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

    
        DB::table('categories')->insert([
            ['name' => 'Brood, groente, fruit'],
            ['name' => 'Klaas, vleeswaren'],
            ['name' => 'Zuivel, plantaardig en eieren'],
            ['name' => 'Bakkerij en banket'],
            ['name' => 'Frisdrank, sappen, koffie en thee'],
            ['name' => 'Pasta, rijst en wereldkeuken'],
            ['name' => 'Soepen, sauzen, kruiden en olie'],
            ['name' => 'Snoep, koek, chips en chocolade'],
            ['name' => 'Baby, verzorging en hygiene'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}


