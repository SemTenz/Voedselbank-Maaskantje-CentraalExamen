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
            ['name' => 'Noten'],
            ['name' => 'Melk'],
            ['name' => 'Gluten'],
            ['name' => 'Soja'],
            ['name' => 'Vis'],
            ['name' => 'Schaaldieren'],
            ['name' => 'Ei'],
            ['name' => 'Selderij'],
            ['name' => 'Mosterd'],
            ['name' => 'Pinda'],
            ['name' => 'Sesamzaad'],
            ['name' => 'Lupine'],
            ['name' => 'Weekdieren'],
            ['name' => 'Zwaveldioxide'],
            ['name' => 'Sulfiet'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('allergies');
    }
}


