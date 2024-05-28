<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteBancaireCategorie extends Model
{
    use HasFactory;

    /**
     * Ce sont les entités à valider pour chaque catégorie de
     * compte bancaire
     */
    protected $fillable = [
        'nomCategorie',
        'description',
        'photo_couverture',
        'status',
        'tarif',
        'taux',
        'heure_douverture',
        'heure_fermeture',
        'jour_douverture'
    ];
}
