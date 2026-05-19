<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cesta extends Model
{
    use HasFactory;

    protected $table = 'cestas';

    protected $fillable = [
        'user_id',
        'data_criacao',
        'valor_total',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produtos()
    {
        return $this->belongsToMany(
            Produto::class,
            'cesta_produto'
        );
    }
}