<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposite extends Model
{
    use HasFactory;

    protected $fillable = [
        'telephone',
        'numero_compte',
        'montant',
        'reference',
        'description'
    ];
}
