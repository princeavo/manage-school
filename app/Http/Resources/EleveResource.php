<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EleveResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'prenoms' => $this->prenoms,
            'date_naissance' => $this->date_naissance->format("d/m/Y"),
            'lieu_naissance' => $this->lieu_naissance,
            'nationalite' => $this->nationalite,
            'sexe' => $this->sexe,
            'photo' => $this->photo,
            'nom_complet_tuteur1' => $this->nom_complet_tuteur1,
            'telephone_tuteur1' => $this->telephone_tuteur1,
            'adresse_tuteur1' => $this->adresse_tuteur1,
            'email_tuteur1' => $this->email_tuteur1,
            'nom_complet_tuteur2' => $this->nom_complet_tuteur2,
            'telephone_tuteur2' => $this->telephone_tuteur2,
            'adresse_tuteur2' => $this->adresse_tuteur2,
            'email_tuteur2' => $this->email_tuteur2,
        ];
    }
}
