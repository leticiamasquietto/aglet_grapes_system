@extends('layouts.app')

@section('title', 'Cesta')

@section('content')

<div class="mb-8">

    <h1 class="text-[32px] font-bold text-[#2A183F]">
        Cesta de Produtos
    </h1>

    <p class="text-[14px] text-[#6B6475] mt-1">
        Selecione produtos para adicionar à sua cesta
    </p>

</div>

<div class="grid grid-cols-3 gap-6">

    <!-- PRODUTOS -->
    <div class="col-span-2 bg-white rounded-3xl p-6 border border-[#EAEAEA]">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-[20px] font-bold text-[#2A183F]">
                Produtos Disponíveis
            </h2>

            <button
                id="btnAdicionar"
                class="bg-[#A695B5] hover:bg-[#8E7B9F] text-white px-5 h-[40px] rounded-2xl text-[14px] font-medium transition"
            >
                Adicionar à Cesta
            </button>

        </div>

        <div class="space-y-4">

            @foreach($produtos as $produto)

                <label class="border border-[#EAEAEA] rounded-2xl p-4 flex justify-between items-center cursor-pointer hover:bg-[#FAF7FD] transition">

                    <div class="flex items-center gap-4">

                        <input
                            type="checkbox"
                            class="produto-checkbox w-5 h-5"
                            value="{{ $produto->id }}"
                        >

                        <div>

                            <p class="text-[16px] font-semibold text-[#2A183F]">
                                {{ $produto->nome }}
                            </p>

                            <p class="text-[13px] text-[#6B6475]">
                                {{ $produto->fornecedor->nome }}
                            </p>

                        </div>

                    </div>

                    <p class="text-[16px] font-semibold text-[#4B2354]">

                        R$
                        {{ number_format($produto->preco, 2, ',', '.') }}

                    </p>

                </label>

            @endforeach

        </div>

    </div>

    <!-- RESUMO -->
    <div class="bg-white rounded-3xl p-6 border border-[#EAEAEA] h-fit">

        <div class="flex items-center gap-4 mb-8">

            <div class="w-12 h-12 rounded-2xl bg-[#F3EEF7] flex items-center justify-center">

                <i data-lucide="shopping-cart" class="w-6 h-6 text-[#4B2354]"></i>

            </div>

            <h2 class="text-[22px] font-bold text-[#2A183F]">
                Resumo da Cesta
            </h2>

        </div>

        <div class="space-y-5 mb-8">

            <div class="flex justify-between">

                <span class="text-[15px] text-[#6B6475]">
                    Produtos
                </span>

                <span
                    id="quantidadeProdutos"
                    class="text-[15px] font-semibold text-[#2A183F]"
                >
                    {{ $cesta->produtos->count() }}
                </span>

            </div>

            <div class="border-t border-[#EAEAEA] pt-5 flex justify-between">

                <span class="text-[15px] text-[#6B6475]">
                    Valor Total
                </span>

                <span
                    id="valorTotal"
                    class="text-[26px] font-bold text-[#2A183F]"
                >
                    R$
                    {{ number_format($cesta->produtos->sum('preco'), 2, ',', '.') }}
                </span>

            </div>

        </div>

        <button
            id="btnFinalizar"
            class="w-full h-[52px] bg-[#A695B5] hover:bg-[#8E7B9F] text-white rounded-2xl text-[16px] font-semibold transition"
        >
            Finalizar Pedido
        </button>

    </div>

</div>

<!-- AJAX -->
<script>

document
    .getElementById('btnAdicionar')
    .addEventListener('click', async () => {

        const checkboxes = document.querySelectorAll('.produto-checkbox:checked');

        let produtos = [];

        checkboxes.forEach(item => {
            produtos.push(item.value);
        });

        if(produtos.length === 0){

            alert('Selecione ao menos um produto.');

            return;
        }

        const response = await fetch(
            "{{ route('cesta.adicionar') }}",
            {
                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },

                body: JSON.stringify({
                    produtos: produtos
                })
            }
        );

        const data = await response.json();

        document.getElementById('quantidadeProdutos')
            .innerText = data.quantidade;

        document.getElementById('valorTotal')
            .innerText =
                'R$ ' +
                Number(data.total).toLocaleString(
                    'pt-BR',
                    {
                        minimumFractionDigits: 2
                    }
                );

        checkboxes.forEach(item => {
            item.checked = false;
        });

    });

/*
|--------------------------------------------------------------------------
| FINALIZAR PEDIDO
|--------------------------------------------------------------------------
*/

document
    .getElementById('btnFinalizar')
    .addEventListener('click', async () => {

        const response = await fetch(
            "{{ route('cesta.finalizar') }}",
            {
                method: 'POST',

                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        );

        const data = await response.json();

        if(data.success){

            document.getElementById('quantidadeProdutos')
                .innerText = '0';

            document.getElementById('valorTotal')
                .innerText = 'R$ 0,00';

            alert('Pedido finalizado com sucesso.');
        }

    });

</script>

@endsection