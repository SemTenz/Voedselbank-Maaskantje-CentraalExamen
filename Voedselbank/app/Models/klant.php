<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class klant extends Model
{
    use HasFactory;

    protected $table = 'klant';

    protected $fillable = [
        'naam',
        'telefoonnummer',
        'email',
        'aantal_volwassenen',
        'aantal_kinderen',
        'aantal_baby',
        'voedselwensen',
        'voedselpakketId',
        'adressId',
    ];

    public function voedselpakketten()
    {
        return $this->hasMany(VoedselPakket::class);
    }
}
