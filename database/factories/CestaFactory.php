<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CestaFactory extends Factory
{
    public function definition(): array
    {
        return [

            'user_id' => User::inRandomOrder()->first()?->id,

            'data_criacao' => now(),

            'valor_total' => fake()->randomFloat(2, 50, 1000),
        ];
    }
}