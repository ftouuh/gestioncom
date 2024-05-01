<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_client',
        'nom',
        'prenom',
        'telephone',
        'address',
        'email',
        'historique'
    ];

    public function Facture()
    {
        return $this->hasMany(Facture::class);
    }

}
