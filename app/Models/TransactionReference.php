<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionReference extends Model
{
    use HasFactory;

    protected $fillable = [
        'description_transfert',
        'expediteur_argent',
        'destinataire_argent',
        'transaction_reference',
        'montant',
        'telephone',
        'taux_recuperer'
    ];

}
