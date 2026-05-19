<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FornecedorFactory extends Factory
{
    public function definition(): array
    {
        return [

            'nome' => fake()->company(),

            'telefone' => fake()->phoneNumber(),

            'email' => fake()->unique()->companyEmail(),
        ];
    }
}