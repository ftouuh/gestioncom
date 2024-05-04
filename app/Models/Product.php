<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'famille',
        'reference',
        'description',
        'quantite',
        'Prix_achat',
        'Prix_unitaire',
    ];
}
