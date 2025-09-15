<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VagaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request)
        {
            'empresa_id' => $this->empresa_id,
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'tipo' => $this->tipo,
            'salario' => $this->salario,
            'horario' => $this->horario,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        };
    }
}
