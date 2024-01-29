<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMedicamento extends Model
{
    use HasFactory;

    protected $table = 'stock_medicamentos';


    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'id_medicamento');
    }

}
