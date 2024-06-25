<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeveranciersTable extends Migration
{
    public function up()
    {
        Schema::create('leveranciers', function (Blueprint $table) {
            $table->id();
            $table->string('bedrijfsnaam');
            $table->string('adres');
            $table->string('contactpersoon_naam');
            $table->string('contactpersoon_email');
            $table->string('telefoonnummer');
            $table->dateTime('eerstvolgende_levering');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leveranciers');
    }
};
