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
            ['name' => 'Brood'],
            ['name' => 'Vis'],
            ['name' => 'Vlees'],
            ['name' => 'Groente'],
            ['name' => 'Fruit'],
            ['name' => 'Zuivel'],
            ['name' => 'Dranken'],
            ['name' => 'Snoep'],
            ['name' => 'Koek'],
            ['name' => 'Chips'],
            ['name' => 'Noten'],
            ['name' => 'Sauzen'],
            ['name' => 'Soep'],
            ['name' => 'Kant-en-klaar'],
            ['name' => 'Diepvries'],
            ['name' => 'Overig'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
