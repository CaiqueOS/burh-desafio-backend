<?php

namespace App\Models;

use App\Models\VagaResource;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'data_nascimento',
    ];

    public function idade() {
        $dataNascimento = new \DateTime($this->data_nascimento);
        $dataAtual = new \DateTime();
        $idade = $dataAtual->diff($dataNascimento)->y;
        return $idade;
    }
    
    public function vagasCandidatas() {
        return $this->belongsToMany(Vaga::class, 'candidaturas', 'usuario_id', 'vaga_id')->get();
    }
}
