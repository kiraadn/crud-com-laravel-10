<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeProduto',
        'nomeFarmaceutico',
        'codigo',
        'descricao',
        'preco',
        'quantidadeStock',
        'id_fornecedor',
        'data_entrada',
        'lote',
        'data_validade',
    ];

    public function fornecedor(){
        return $this->belongsTo(Fornecedor::class, 'id_fornecedor');
    }
}
