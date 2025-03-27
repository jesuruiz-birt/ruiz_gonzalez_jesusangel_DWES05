<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CancionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_cancion' => $this->id_cancion,
            'nombre' => $this->nombre,
            'anio_lanzamiento' => $this->anio_lanzamiento,
            'genero' => $this->genero,
            'artista' => $this->artista->nombre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
