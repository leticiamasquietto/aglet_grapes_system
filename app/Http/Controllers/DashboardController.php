<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Cesta;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | MÉTRICAS
        |--------------------------------------------------------------------------
        */

        $totalProdutos = Produto::count();

        $totalFornecedores = Fornecedor::count();

        /*
        |--------------------------------------------------------------------------
        | PRODUTOS EM CESTAS
        |--------------------------------------------------------------------------
        */

        $produtosNaCesta = \DB::table('cesta_produto')->count();

        /*
        |--------------------------------------------------------------------------
        | VENDAS DO MÊS
        |--------------------------------------------------------------------------
        */

        $vendasMes = Cesta::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('valor_total');

        /*
        |--------------------------------------------------------------------------
        | PRODUTOS RECENTES
        |--------------------------------------------------------------------------
        */

        $produtosRecentes = Produto::with('fornecedor')
            ->latest()
            ->take(4)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | FORNECEDORES EM DESTAQUE
        |--------------------------------------------------------------------------
        */

        $fornecedoresDestaque = Fornecedor::withCount('produtos')
            ->orderByDesc('produtos_count')
            ->take(4)
            ->get();

        return view('dashboard.index', compact(
            'totalProdutos',
            'totalFornecedores',
            'produtosNaCesta',
            'vendasMes',
            'produtosRecentes',
            'fornecedoresDestaque'
        ));
    }
}