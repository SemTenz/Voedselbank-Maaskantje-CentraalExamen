<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['naam', 'allergie_id', 'categorie_id', 'aantal'];


    public function allergie()
    {
        return $this->belongsTo(Allergy::class, 'allergie_id');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
}
