<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
    protected function data(): Attribute{
        return Attribute::make(
        get: fn ($value) => json_decode($value,true),
        set: fn ($value) => json_encode($value));
}}
