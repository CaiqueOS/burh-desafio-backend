<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
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
            'nome' => $this->nome,
            'email' => $this->email,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'idade' => $this->idade(),
            'vagas_candidatas' => $this->vagasCandidatas(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
