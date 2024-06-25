<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    use HasFactory;

    protected $fillable = [
        'bedrijfsnaam',
        'adres',
        'contactpersoon_naam',
        'contactpersoon_email',
        'telefoonnummer',
        'eerstvolgende_levering',
    ];
}
