<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $table = 'medicamentos';

    protected $fillable = [
        'name',
        'packing',
        'generic_name',
        'nome_fornecedor',
        'data_validade',
        'descricao',
    ];

    public function stockMedicamentos()
    {
        return $this->hasMany(StockMedicamento::class, 'id_medicamento');
    }

}
