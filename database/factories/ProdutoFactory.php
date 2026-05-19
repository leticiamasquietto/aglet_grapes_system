<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    public function definition(): array
    {
        return [

            'nome' => fake()->word(),

            'descricao' => fake()->sentence(),

            'preco' => fake()->randomFloat(2, 10, 1000),

            'fornecedor_id' => Fornecedor::inRandomOrder()->first()?->id,
        ];
    }
}