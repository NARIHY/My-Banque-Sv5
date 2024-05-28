<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Publicite extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description_publicite',
        'media',
        'users_id',
        'status_pub',
        'status_suprimer'
    ];

    /**
     * La relation entre Publicite et utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
