<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->unsignedBigInteger('allergie_id')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->timestamps();

            $table->foreign('allergie_id')->references('id')->on('allergies')->onDelete('set null');
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}

