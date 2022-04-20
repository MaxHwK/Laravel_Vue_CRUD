<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ProjectResource
 * @package App\Http\Resources
 */
class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'numero' => $this->numero,
            'nom' => $this->nom,
            'description' => $this->description,
            'technologies' => $this->technologies,
            'client' => $this->client->nom,
            'type' => $this->type->libelle,
            'responsable' => $this->responsable,
            'date_debut' => Carbon::parse($this->date_debut)->format('d/m/Y'),
            'date_fin_estimee' => Carbon::parse($this->date_fin_estimee)->format('d/m/Y'),
            'date_fin_reelle' => Carbon::parse($this->date_fin_reelle)->format('d/m/Y'),
            'created_at' => Carbon::parse($this->created_at)->toDayDateTimeString(),
            'updated_at' => Carbon::parse($this->updated_at)->toDayDateTimeString(),
        ];
    }
}