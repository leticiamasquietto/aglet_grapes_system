<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'fornecedor_id',
    ];

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function cestas()
    {
        return $this->belongsToMany(
            Cesta::class,
            'cesta_produto'
        );
    }
}