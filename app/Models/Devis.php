<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'devis_numero',
        'date_commande',
        'societe',
        'ice',
        'products',
        'mode_reglement',
        'versement',
        'reste',
        'saisi_par',
        'date_devis',
        'total_TTC',
        'TVA',
        'total_HT',
        'str_ttc',
        'id_client',
    ];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
