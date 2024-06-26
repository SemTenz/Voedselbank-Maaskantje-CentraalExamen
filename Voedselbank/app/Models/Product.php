<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['naam', 'allergies_id', 'categorie_id', 'aantal'];

    public function allergy()
    {
        return $this->belongsTo(Allergie::class, 'allergies_id'); // <-- Aangepast naar allergies_id
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function voedselPakketten()
    {
        return VoedselPakket::where('product_id', $this->id)->exists();
    }
}
