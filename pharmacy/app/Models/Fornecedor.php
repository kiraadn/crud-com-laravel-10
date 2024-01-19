<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nomeRepresntante',
        'telefone',
        'celular',
        'email',
        'tipoFornecedor',
        'endereco',
        'EntidadeFornecedor',
        'Nuit',
        'areaActuacao',
        'observacao',
    ];

    public function produtos(){
        return $this->hasMany(Medicamento::class, 'id_fornecedor');
    }
}
