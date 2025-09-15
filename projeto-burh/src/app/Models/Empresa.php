<?php

namespace App\Models;

use App\Models\Vaga;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'cnpj',
        'plano',
    ];

    public function vagas()
    {
        return $this->hasMany(Vaga::class);
    }
    //
}
