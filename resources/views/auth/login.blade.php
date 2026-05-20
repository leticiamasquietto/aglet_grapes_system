<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite('resources/css/app.css')
</head>

<body class="h-screen overflow-hidden bg-white">

<div class="flex h-screen">

    <!-- ESQUERDA -->
    <div class="w-1/2 bg-[#FAFAFA] flex flex-col justify-center items-center px-20">

        <img
            src="{{ asset('images/logo.png') }}"
            alt="Logo"
            class="w-52 mb-8"
        >

        <div class="w-full max-w-lg">

            <h1 class="text-[32px] leading-none font-bold text-[#2A183F] mb-3">
                Bem-vindo de volta
            </h1>

            <p class="text-[#6B6475] text-[14px] text-center mb-12">
                Faça login para continuar
            </p>

            @if(session('erro'))
                <div class="bg-red-100 text-red-600 p-3 rounded-xl mb-6 text-sm">
                    {{ session('erro') }}
                </div>
            @endif

            <form action="/login" method="POST">

                @csrf

                <!-- EMAIL -->
                <div class="mb-6">

                    <label class="block text-[#2A183F] text-[14px] font-semibold mb-3">
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="nome@email.com"
                        class="w-full h-[56px] rounded-3xl border border-[#E4D9F3] px-6 text-[16px] outline-none focus:border-[#A855F7]"
                        required
                    >
                </div>

                <!-- SENHA -->
                <div class="mb-8">

                    <label class="block text-[#2A183F] text-[14px] font-semibold mb-3">
                        Senha
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="******"
                        class="w-full h-[56px] rounded-3xl border-2 border-[#B57AF4] px-6 text-[16px] outline-none"
                        required
                    >
                </div>

                <!-- BOTÃO -->
                <button
                    type="submit"
                    class="w-full h-[56px] bg-[#4B2354] hover:bg-[#3c1b43] text-white text-[18px] font-semibold rounded-3xl transition"
                >
                    Entrar
                </button>

            </form>

            <!-- LINK -->
            <p class="text-center text-[#6B6475] mt-10 text-[14px]">
                Não tem uma conta?

                <a
                    href="/register"
                    class="text-[#4B2354] font-semibold"
                >
                    Criar conta
                </a>
            </p>

        </div>

    </div>

    <!-- DIREITA -->
    <div class="w-1/2 relative overflow-hidden bg-gradient-to-br from-[#4B2354] via-[#6E3D88] to-[#A87DDA] flex items-center justify-center">

        <!-- PNGs decorativos -->
        <img src="{{ asset('images/decorations/grape.png') }}"
             class="absolute top-16 left-28 w-24 opacity-10">

        <img src="{{ asset('images/decorations/grape.png') }}"
             class="absolute top-40 right-32 w-20 opacity-10">

        <img src="{{ asset('images/decorations/grape.png') }}"
             class="absolute bottom-32 left-40 w-32 opacity-10">

        <img src="{{ asset('images/decorations/grape.png') }}"
             class="absolute bottom-24 right-24 w-24 opacity-10">

        <!-- TEXO -->
        <div class="relative z-10 text-center text-white px-24">

            <h2 class="text-[48px] leading-[56px] font-bold mb-10">
                Produtos Artesanais de Uva
            </h2>

            <p class="text-[18px] leading-[32px] opacity-95">
                Gerencie seus produtos, fornecedores e vendas
                de forma elegante e eficiente
            </p>

        </div>

    </div>

</div>

</body>
</html>