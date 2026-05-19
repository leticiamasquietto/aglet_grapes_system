<?php

namespace Database\Seeders;

use App\Models\Cesta;
use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();

        Fornecedor::factory(5)->create();

        Produto::factory(20)->create();

        Cesta::factory(10)->create();
    }
}