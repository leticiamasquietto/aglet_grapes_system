<aside class="w-[250px] bg-[#4B2354] text-white flex flex-col justify-between">

    <!-- TOPO -->
    <div>

        <!-- LOGO -->
        <div class="h-[110px] flex items-center justify-center border-b border-[#694172]">

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Logo"
                class="w-28"
            >

        </div>

        <!-- MENU -->
        <nav class="mt-5 px-3 flex flex-col gap-2">

            <!-- DASHBOARD -->
            <a
                href="/dashboard"
                class="flex items-center gap-3 px-4 py-4 rounded-2xl bg-[#6B3A76] hover:bg-[#74407f] transition"
            >
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>

                <span class="text-[14px]">
                    Dashboard
                </span>
            </a>

            <!-- PRODUTOS -->
            <a
                href="/produtos"
                class="flex items-center gap-3 px-4 py-4 rounded-2xl hover:bg-[#6B3A76] transition"
            >
                <i data-lucide="package" class="w-5 h-5"></i>

                <span class="text-[14px]">
                    Produtos
                </span>
            </a>

            <!-- FORNECEDORES -->
            <a
                href="/fornecedores"
                class="flex items-center gap-3 px-4 py-4 rounded-2xl hover:bg-[#6B3A76] transition"
            >
                <i data-lucide="users" class="w-5 h-5"></i>

                <span class="text-[14px]">
                    Fornecedores
                </span>
            </a>

            <!-- CESTA -->
            <a
                href="/cesta"
                class="flex items-center gap-3 px-4 py-4 rounded-2xl hover:bg-[#6B3A76] transition"
            >
                <i data-lucide="shopping-cart" class="w-5 h-5"></i>

                <span class="text-[14px]">
                    Cesta
                </span>
            </a>

        </nav>

    </div>

    <!-- RODAPÉ -->
    <div class="p-4 border-t border-[#694172]">

        <form action="/logout" method="POST">

            @csrf

            <button
                class="flex items-center gap-3 text-white hover:text-gray-200 transition"
            >
                <i data-lucide="log-out" class="w-5 h-5"></i>

                <span class="text-[14px]">
                    Sair
                </span>
            </button>

        </form>

    </div>

</aside>