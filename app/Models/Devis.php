<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_facture',
        'date_commande',
        'nom_client',
        'prenom_client',
        'versement',
        'reste',
        'saisi_par',
        'saisi_le ',
        'total_TTC',
        'TVA',
        'total_HT',
    ];

 
}
