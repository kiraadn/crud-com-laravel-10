<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transportador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeCompleto',
        'celular',
        'telefone',
        'email',
        'morada',
        'areaActuacao',
        'tipoEmpresa',
        'cartaConducao',
        'cartaValidade',
        'metodoPagamento',
        'contaPagamento',
        'biFrontal',
        'biTraseira',
        'licensa'
    ];
}
