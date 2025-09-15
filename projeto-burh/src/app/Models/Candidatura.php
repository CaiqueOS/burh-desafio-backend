<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidatura extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'vaga_id',
    ];
    //
}
