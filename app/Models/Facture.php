<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'facture_numero',
        'date_commande',
        'societe',
        'ice',
        'products',
        'mode_reglement',
        'versement',
        'reste',
        'saisi_par',
        'date_facture',
        'total_TTC',
        'TVA',
        'total_HT',
        'str_ttc',
        'id_client',
    ];

    
}
