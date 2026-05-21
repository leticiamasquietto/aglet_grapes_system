<?php

namespace App\Http\Controllers;

use App\Models\Cesta;
use App\Models\Produto;
use Illuminate\Http\Request;

class CestaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | TELA DA CESTA
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $produtos = Produto::with('fornecedor')
            ->latest()
            ->get();

        $cesta = Cesta::firstOrCreate(
            [
                'user_id' => auth()->id()
            ],
            [
                'data_criacao' => now(),
                'valor_total' => 0
            ]
        );

        $cesta->load('produtos');

        return view('cesta.index', compact(
            'produtos',
            'cesta'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | ADICIONAR PRODUTOS
    |--------------------------------------------------------------------------
    */

    public function adicionar(Request $request)
    {
        $request->validate([
            'produtos' => 'required|array|min:1'
        ]);

        $cesta = Cesta::firstOrCreate(
            [
                'user_id' => auth()->id()
            ],
            [
                'data_criacao' => now(),
                'valor_total' => 0
            ]
        );
        foreach ($request->produtos as $produtoId) {

            if (!$cesta->produtos()->where('produto_id', $produtoId)->exists()) {

                $cesta->produtos()->attach($produtoId);
                $cesta->valor_total = $cesta->produtos()->sum('preco');
                $cesta->save();
            }
        }

        $cesta->load('produtos');

        return response()->json([
            'success' => true,
            'quantidade' => $cesta->produtos->count(),
            'total' => $cesta->produtos->sum('preco')
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | FINALIZAR PEDIDO
    |--------------------------------------------------------------------------
    */

    public function finalizar()
    {
        $cesta = Cesta::where('user_id', auth()->id())
            ->first();

        if (!$cesta) {

            return response()->json([
                'success' => false
            ]);
        }

        $cesta->produtos()->detach();

        $cesta->valor_total = 0;
        $cesta->save();

        return response()->json([
            'success' => true
        ]);
    }
}