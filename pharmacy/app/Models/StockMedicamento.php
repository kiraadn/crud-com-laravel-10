<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMedicamento extends Model
{
    use HasFactory;

    protected $table = 'stock_medicamentos';

    protected $fillable = [
        'id_medicamento',
        'batch_id',
        'expiry_date',
        'quantity',
        'mrp',
        'rate'
    ];

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'id_medicamento');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($medicamento) {
            $medicamento->batch_id = $medicamento->gerarCodigo();
        });
    }

    // gerador de codigo
    private function gerarCodigo()
    {
        do {
            $duasPrimeirasPalavras = substr($this->medicamento->name, 0, 3);
            $codigoIncremental = sprintf('%04d', static::count() + 1);

            $codigo =  strtoupper($duasPrimeirasPalavras . $this->id_medicamento . $this->id . $codigoIncremental);
        } while (self::where('batch_id', $codigo)->exists());

        return $codigo;
    }
}
