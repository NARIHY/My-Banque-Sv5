<?php

namespace App\Http\Resources;
use App\Models\CompteBancaire;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @compteBancaire \App\Models\CompteBancaire $resource
 */
class CompteBancaireResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'cin' => $this->resource->cin,
            'numero_compte' => $this->resource->numero_compte,
            'addresse' => $this->resource->addresse,
            'compte_bancaire_categorie_id' => $this->resource->compteBancaireCategorie,
            'status_compte_id' => $this->resource->status_compte_id,
            'created_at' => $this->resource->created_at,
            'users_id' => $this->resource->users,
        ];
    }
}
