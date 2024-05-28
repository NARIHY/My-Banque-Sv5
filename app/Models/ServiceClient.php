<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ServiceClient extends Model
{
    use HasFactory;
    /*
    Schema::create('service_clients', function (Blueprint $table) {
            $table->id();
            $table->string('sujet_conversation');
            $table->longText('introduction_lettre');
            $table->longText('contenu_lettre');
            $table->longText('conclusion_lettre');
            $table->foreignIdFor(\App\Models\User::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    */
    protected $fillable = [
        'sujet_conversation',
        'introduction_lettre',
        'contenu_lettre',
        'conclusion_lettre',
        'users_id',
        'status',
        'lecteur'
    ];


    /**
     * La relation entre compte bancaire et utilisateur
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
