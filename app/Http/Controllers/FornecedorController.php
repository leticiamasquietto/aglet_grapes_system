<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTAGEM
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $fornecedores = Fornecedor::latest()->get();

        return view('fornecedores.index', compact('fornecedores'));
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
            'telefone' => 'required|max:20',
            'email' => 'required|email|unique:fornecedores,email'
        ]);

        Fornecedor::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email
        ]);

        return redirect()
            ->route('fornecedores.index')
            ->with('success', 'Fornecedor cadastrado com sucesso.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDITAR
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        $request->validate([
            'nome' => 'required|max:100',
            'telefone' => 'required|max:20',
            'email' => 'required|email|unique:fornecedores,email,' . $fornecedor->id
        ]);

        $fornecedor->update([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Fornecedor atualizado com sucesso.'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | EXCLUIR
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);  
    
        /*
        |--------------------------------------------------------------------------
        | NÃO PERMITIR EXCLUSÃO
        |--------------------------------------------------------------------------
        */

        if ($fornecedor->produtos()->count() > 0) {

            return response()->json([
                'success' => false,
                'message' => 'Não é possível excluir fornecedor com produtos.'
            ], 400);
        }

        $fornecedor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Fornecedor excluído com sucesso.'
        ]);
    }

    public function edit($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        return response()->json([
            'id' => $fornecedor->id,
            'nome' => $fornecedor->nome,
            'telefone' => $fornecedor->telefone,
            'email' => $fornecedor->email,
        ]);
    }
}