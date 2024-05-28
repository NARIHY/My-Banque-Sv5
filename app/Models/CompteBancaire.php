<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @
 */
class CompteBancaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'cin',
        'code_secret',
        'numero_compte',
        'addresse',
        'users_id',
        'compte_bancaire_categorie_id',
        'status_compte_id',
        'corbeille',
        'solde'
    ];



    /**
     * La relation entre compte bancaire et utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * La relation entre la catégorie de compte et un compte
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function compteBancaireCategorie(): BelongsTo
    {
        return $this->belongsTo(\App\Models\CompteBancaireCategorie::class);
    }

    /**
     * La relation entre la status d'un compte et un compte
     * @return  \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusCompte(): BelongsTo
    {
        return $this->belongsTo(\App\Models\StatusCompte::class);
    }
}
