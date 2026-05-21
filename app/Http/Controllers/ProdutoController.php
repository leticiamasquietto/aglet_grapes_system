<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTAGEM
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $produtos = Produto::with('fornecedor')
            ->latest()
            ->get();

        $fornecedores = Fornecedor::orderBy('nome')->get();

        return view('produtos.index', compact(
            'produtos',
            'fornecedores'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | CADASTRAR
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'preco' => 'required|numeric|min:0',
            'fornecedor_id' => 'required|exists:fornecedores,id',
        ]);

        Produto::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'fornecedor_id' => $request->fornecedor_id,
        ]);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDITAR
    |--------------------------------------------------------------------------
    */

    public function edit(Produto $produto)
    {
        return response()->json($produto);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'descricao' => 'required|max:255',
            'preco' => 'required|numeric|min:0',
            'fornecedor_id' => 'required|exists:fornecedores,id',
        ]);

        $produto->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'preco' => $request->preco,
            'fornecedor_id' => $request->fornecedor_id,
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | EXCLUIR
    |--------------------------------------------------------------------------
    */

    public function destroy(Produto $produto)
    {
        /*
        |--------------------------------------------------------------------------
        | NÃO PERMITIR EXCLUSÃO
        |--------------------------------------------------------------------------
        */

        if ($produto->cestas()->count() > 0) {

            return response()->json([
                'success' => false,
                'message' => 'Produto está em uma cesta.'
            ], 400);
        }

        $produto->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produto excluído.'
        ]);
    }
}