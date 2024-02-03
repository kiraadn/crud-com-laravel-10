<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table = 'fornecedors';

    protected $fillable = [
        'suppliers_name',
        'suppliers_company',
        'suppliers_email',
        'contact_number',
        'celphone',
        'address'
    ];

}
