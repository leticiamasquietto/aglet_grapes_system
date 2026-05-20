@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- TÍTULO -->
<div class="mb-8">

    <h1 class="text-[32px] font-bold text-[#2A183F]">
        Dashboard
    </h1>

    <p class="text-[#6B6475] text-[14px] mt-1">
        Bem-vindo ao Aglet Grapes
    </p>

</div>

<!-- CARDS -->
<div class="grid grid-cols-4 gap-5 mb-6">

    <!-- CARD -->
    <div class="bg-white rounded-3xl p-5 shadow-sm border border-[#EAEAEA]">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-[#6B6475] text-[14px]">
                    Produtos Cadastrados
                </p>

                <h2 class="text-[28px] font-bold text-[#2A183F] mt-1">
                    48
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-[#F3EEF7] flex items-center justify-center">

                <i data-lucide="package" class="w-6 h-6 text-[#6B3A76]"></i>

            </div>

        </div>

    </div>

    <!-- CARD -->
    <div class="bg-white rounded-3xl p-5 shadow-sm border border-[#EAEAEA]">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-[#6B6475] text-[14px]">
                    Fornecedores Ativos
                </p>

                <h2 class="text-[28px] font-bold text-[#2A183F] mt-1">
                    12
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-[#F3EEF7] flex items-center justify-center">

                <i data-lucide="users" class="w-6 h-6 text-[#6B3A76]"></i>

            </div>

        </div>

    </div>

    <!-- CARD -->
    <div class="bg-white rounded-3xl p-5 shadow-sm border border-[#EAEAEA]">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-[#6B6475] text-[14px]">
                    Produtos na Cesta
                </p>

                <h2 class="text-[28px] font-bold text-[#2A183F] mt-1">
                    8
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-[#EEF4EA] flex items-center justify-center">

                <i data-lucide="shopping-cart" class="w-6 h-6 text-[#93A46F]"></i>

            </div>

        </div>

    </div>

    <!-- CARD -->
    <div class="bg-white rounded-3xl p-5 shadow-sm border border-[#EAEAEA]">

        <div class="flex justify-between items-start">

            <div>

                <p class="text-[#6B6475] text-[14px]">
                    Vendas do Mês
                </p>

                <h2 class="text-[28px] font-bold text-[#2A183F] mt-1">
                    R$ 12.450
                </h2>

            </div>

            <div class="w-14 h-14 rounded-2xl bg-[#F7F4EA] flex items-center justify-center">

                <i data-lucide="trending-up" class="w-6 h-6 text-[#C2A85C]"></i>

            </div>

        </div>

    </div>

</div>

<!-- ÁREA INFERIOR -->
<div class="grid grid-cols-2 gap-5">

    <!-- PRODUTOS -->
    <div class="bg-white rounded-3xl p-5 border border-[#EAEAEA]">

        <h2 class="text-[22px] font-bold text-[#2A183F] mb-5">
            Produtos Recentes
        </h2>

        <div class="space-y-3">

            @for($i = 0; $i < 4; $i++)

                <div class="bg-[#FAF7FD] rounded-2xl p-4 flex justify-between items-center">

                    <div>

                        <p class="text-[16px] font-semibold text-[#2A183F]">
                            Geleia de Uva Roxa
                        </p>

                        <p class="text-[13px] text-[#6B6475]">
                            Fazenda Vale Verde
                        </p>

                    </div>

                    <p class="text-[16px] font-semibold text-[#4B2354]">
                        R$ 28,00
                    </p>

                </div>

            @endfor

        </div>

    </div>

    <!-- FORNECEDORES -->
    <div class="bg-white rounded-3xl p-5 border border-[#EAEAEA]">

        <h2 class="text-[22px] font-bold text-[#2A183F] mb-5">
            Fornecedores em Destaque
        </h2>

        <div class="space-y-3">

            @for($i = 0; $i < 4; $i++)

                <div class="bg-[#FAF7FD] rounded-2xl p-4 flex justify-between items-center">

                    <div>

                        <p class="text-[16px] font-semibold text-[#2A183F]">
                            Fazenda Vale Verde
                        </p>

                        <p class="text-[13px] text-[#6B6475]">
                            12 produtos
                        </p>

                    </div>

                    <p class="text-[16px] font-semibold text-[#C2A85C]">
                        ★ 4.8
                    </p>

                </div>

            @endfor

        </div>

    </div>

</div>

@endsection