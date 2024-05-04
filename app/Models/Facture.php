<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date_commande',
        'nom_client',
        'prenom_client',
        'qte',
        'ref_p',
        'desc_p',
        'mode_reglement',
        'versement',
        'reste',
        'saisi_par',
        'saisi_le ',
        'total_TTC',
        'TVA',
        'total_HT',
        'id_client',
        'id_produit',
    ];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
