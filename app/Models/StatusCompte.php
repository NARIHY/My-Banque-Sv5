<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusCompte extends Model
{
    use HasFactory;

    /**
     * rendre les entités fillable
     */
    protected $fillable = [
        'titre'
    ];
}
