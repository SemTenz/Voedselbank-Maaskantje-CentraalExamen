<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergy extends Model
{
    use HasFactory;

    // Explicitly defining the table is optional if it follows Laravel's naming convention
    protected $table = 'allergie';

    // Assuming 'name' is a field in the 'allergies' table that we want to be mass assignable
    protected $fillable = ['name', 'description', 'image'];
}
