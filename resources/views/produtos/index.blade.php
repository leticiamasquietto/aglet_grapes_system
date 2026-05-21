@extends('layouts.app')

@section('title', 'Produtos')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-[32px] font-bold text-[#2A183F]">
            Produtos
        </h1>

        <p class="text-[14px] text-[#6B6475]">
            Gerencie seus produtos artesanais
        </p>

    </div>

</div>

<!-- ALERTAS -->
@if(session('success'))

    <div class="bg-green-100 text-green-700 p-4 rounded-2xl mb-6">
        {{ session('success') }}
    </div>

@endif

@if(session('error'))

    <div class="bg-red-100 text-red-700 p-4 rounded-2xl mb-6">
        {{ session('error') }}
    </div>

@endif

<div class="grid grid-cols-3 gap-6">

    <!-- FORM -->
    <div class="bg-white rounded-3xl p-6 border border-[#EAEAEA] h-fit">

        <h2 class="text-[24px] font-bold text-[#2A183F] mb-6">
            Novo Produto
        </h2>

        <form action="{{ route('produtos.store') }}" method="POST">

            @csrf

            <!-- NOME -->
            <div class="mb-4">

                <label class="block text-[14px] mb-2 text-[#2A183F]">
                    Nome do Produto
                </label>

                <input
                    type="text"
                    name="nome"
                    class="w-full h-[50px] rounded-2xl border border-[#E5E5E5] px-4 text-[14px]"
                    placeholder="Ex: Geleia de Uva"
                    required
                >

            </div>

            <!-- DESCRIÇÃO -->
            <div class="mb-4">

                <label class="block text-[14px] mb-2 text-[#2A183F]">
                    Descrição
                </label>

                <textarea
                    name="descricao"
                    rows="4"
                    class="w-full rounded-2xl border border-[#E5E5E5] p-4 text-[14px]"
                    placeholder="Descrição do produto"
                    required
                ></textarea>

            </div>

            <!-- PREÇO -->
            <div class="mb-4">

                <label class="block text-[14px] mb-2 text-[#2A183F]">
                    Preço (R$)
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="preco"
                    class="w-full h-[50px] rounded-2xl border border-[#E5E5E5] px-4 text-[14px]"
                    placeholder="0.00"
                    required
                >

            </div>

            <!-- FORNECEDOR -->
            <div class="mb-6">

                <label class="block text-[14px] mb-2 text-[#2A183F]">
                    Fornecedor
                </label>

                <select
                    name="fornecedor_id"
                    class="w-full h-[50px] rounded-2xl border border-[#E5E5E5] px-4 text-[14px]"
                    required
                >

                    <option value="">
                        Selecione
                    </option>

                    @foreach($fornecedores as $fornecedor)

                        <option value="{{ $fornecedor->id }}">
                            {{ $fornecedor->nome }}
                        </option>

                    @endforeach

                </select>

            </div>

            <button
                class="w-full h-[50px] bg-[#4B2354] hover:bg-[#3D1D44] text-white rounded-2xl text-[15px] font-medium transition"
            >
                Cadastrar
            </button>

        </form>

    </div>

    <!-- LISTA -->
    <div class="col-span-2 bg-white rounded-3xl p-6 border border-[#EAEAEA]">

        <h2 class="text-[24px] font-bold text-[#2A183F] mb-6">
            Lista de Produtos
        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b border-[#EAEAEA]">

                    <th class="text-left pb-4 text-[14px] text-[#2A183F]">
                        Produto
                    </th>

                    <th class="text-left pb-4 text-[14px] text-[#2A183F]">
                        Descrição
                    </th>

                    <th class="text-left pb-4 text-[14px] text-[#2A183F]">
                        Preço
                    </th>

                    <th class="text-left pb-4 text-[14px] text-[#2A183F]">
                        Fornecedor
                    </th>

                    <th class="text-right pb-4 text-[14px] text-[#2A183F]">
                        Ações
                    </th>

                </tr>

            </thead>

            <tbody>

                @foreach($produtos as $produto)

                    <tr id="produto-{{ $produto->id }}" class="border-b border-[#F1F1F1]">

                        <td class="py-5">

                            <p class="text-[15px] font-semibold text-[#2A183F]">
                                {{ $produto->nome }}
                            </p>

                        </td>

                        <td class="py-5 text-[14px] text-[#6B6475]">
                            {{ $produto->descricao }}
                        </td>

                        <td class="py-5 text-[14px] text-[#2A183F]">
                            R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        </td>

                        <td class="py-5 text-[14px] text-[#2A183F]">
                            {{ $produto->fornecedor->nome }}
                        </td>

                        <td class="py-5">

                            <div class="flex justify-end gap-4">

                                <!-- EDITAR -->
                                <button
                                    onclick="abrirModalEditar({{ $produto->id }})"
                                    class="text-[#4B2354] hover:text-[#2A183F]"
                                >
                                    <i data-lucide="pencil" class="w-5 h-5"></i>
                                </button>

                                <!-- EXCLUIR -->
                                <button
                                    onclick="excluirProduto({{ $produto->id }})"
                                    class="text-red-500 hover:text-red-700"
                                >
                                    <i data-lucide="trash-2" class="w-5 h-5"></i>
                                </button>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<!-- MODAL -->
<div
    id="modalEditar"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white w-[500px] rounded-3xl p-8">

        <h2 class="text-[24px] font-bold text-[#2A183F] mb-6">
            Editar Produto
        </h2>

        <form id="formEditar">

            @csrf
            @method('PUT')

            <input type="hidden" id="edit_id">

            <div class="mb-4">

                <label class="block text-[14px] mb-2">
                    Nome
                </label>

                <input
                    type="text"
                    id="edit_nome"
                    class="w-full h-[50px] border rounded-2xl px-4"
                >

            </div>

            <div class="mb-4">

                <label class="block text-[14px] mb-2">
                    Descrição
                </label>

                <textarea
                    id="edit_descricao"
                    class="w-full border rounded-2xl p-4"
                ></textarea>

            </div>

            <div class="mb-4">

                <label class="block text-[14px] mb-2">
                    Preço
                </label>

                <input
                    type="number"
                    step="0.01"
                    id="edit_preco"
                    class="w-full h-[50px] border rounded-2xl px-4"
                >

            </div>

            <div class="mb-6">

                <label class="block text-[14px] mb-2">
                    Fornecedor
                </label>

                <select
                    id="edit_fornecedor"
                    class="w-full h-[50px] border rounded-2xl px-4"
                >

                    @foreach($fornecedores as $fornecedor)

                        <option value="{{ $fornecedor->id }}">
                            {{ $fornecedor->nome }}
                        </option>

                    @endforeach

                </select>

            </div>

            <div class="flex justify-end gap-4">

                <button
                    type="button"
                    onclick="fecharModal()"
                    class="px-5 h-[45px] rounded-2xl border"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="px-5 h-[45px] rounded-2xl bg-[#4B2354] text-white"
                >
                    Salvar
                </button>

            </div>

        </form>

    </div>

</div>

<script>

    let produtoId = null;

    async function abrirModalEditar(id)
    {
        produtoId = id;

        const response = await fetch(`/produtos/${id}/edit`);
        const produto = await response.json();

        document.getElementById('edit_nome').value = produto.nome;
        document.getElementById('edit_descricao').value = produto.descricao;
        document.getElementById('edit_preco').value = produto.preco;
        document.getElementById('edit_fornecedor').value = produto.fornecedor_id;

        document
            .getElementById('modalEditar')
            .classList
            .remove('hidden');

        document
            .getElementById('modalEditar')
            .classList
            .add('flex');
    }

    function fecharModal()
    {
        document
            .getElementById('modalEditar')
            .classList
            .add('hidden');
    }

    document
        .getElementById('formEditar')
        .addEventListener('submit', async function(e)
    {
        e.preventDefault();

        await fetch(`/produtos/${produtoId}`, {

            method: 'POST',

            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },

            body: new URLSearchParams({

                _method: 'PUT',

                nome: document.getElementById('edit_nome').value,
                descricao: document.getElementById('edit_descricao').value,
                preco: document.getElementById('edit_preco').value,
                fornecedor_id: document.getElementById('edit_fornecedor').value,

            })

        });

        location.reload();
    });


    async function excluirProduto(id)
    {
        if (!confirm('Deseja excluir este produto?')) {
            return;
        }

        const response = await fetch(`/produtos/${id}`, {

            method: 'POST',

            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
            },

            body: new URLSearchParams({
                _method: 'DELETE'
            })

        });

        const data = await response.json();

        if (data.success) {

            document
                .getElementById(`produto-${id}`)
                .remove();

        } else {

            alert(data.message);

        }
    }
</script>

@endsection