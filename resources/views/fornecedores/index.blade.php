@extends('layouts.app')

@section('title', 'Fornecedores')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-[32px] font-bold text-[#2A183F]">
            Fornecedores
        </h1>

        <p class="text-[14px] text-[#6B6475]">
            Gerencie seus fornecedores
        </p>

    </div>

</div>

<!-- ERROS -->
@if ($errors->any())

    <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-2xl mb-6">

        <ul class="list-disc pl-5 text-[14px]">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

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

<!-- GRID -->
<div class="grid grid-cols-3 gap-6">

    <!-- FORM -->
    <div class="bg-white rounded-3xl p-6 border border-[#EAEAEA] h-fit">

        <h2 class="text-[22px] font-bold text-[#2A183F] mb-6">
            Novo Fornecedor
        </h2>

        <form action="{{ route('fornecedores.store') }}" method="POST">

            @csrf

            <!-- NOME -->
            <div class="mb-4">

                <label class="block text-[14px] text-[#2A183F] mb-2">
                    Nome
                </label>

                <input
                    type="text"
                    name="nome"
                    placeholder="Nome do fornecedor"
                    class="w-full h-[52px] rounded-2xl border border-[#E5E5E5] px-4 text-[14px]"
                    required
                >

            </div>

            <!-- TELEFONE -->
            <div class="mb-4">

                <label class="block text-[14px] text-[#2A183F] mb-2">
                    Telefone
                </label>

                <input
                    type="text"
                    name="telefone"
                    placeholder="(00) 00000-0000"
                    class="w-full h-[52px] rounded-2xl border border-[#E5E5E5] px-4 text-[14px]"
                    required
                >

            </div>

            <!-- EMAIL -->
            <div class="mb-6">

                <label class="block text-[14px] text-[#2A183F] mb-2">
                    E-mail
                </label>

                <input
                    type="email"
                    name="email"
                    placeholder="email@exemplo.com"
                    class="w-full h-[52px] rounded-2xl border border-[#E5E5E5] px-4 text-[14px]"
                    required
                >

            </div>

            <!-- BOTÃO -->
            <button
                class="w-full h-[52px] bg-[#4B2354] hover:bg-[#3D1D44] text-white rounded-2xl text-[15px] font-medium transition"
            >
                Cadastrar
            </button>

        </form>

    </div>

    <!-- LISTA -->
    <div class="col-span-2 bg-white rounded-3xl p-8 border border-[#EAEAEA] shadow-sm">

        <h2 class="text-[24px] font-bold text-[#2A183F] mb-8">
            Lista de Fornecedores
        </h2>

        <!-- CABEÇALHO -->
        <div class="grid grid-cols-12 pb-4 border-b border-[#EAEAEA]">

            <div class="col-span-3">
                <p class="text-[15px] font-semibold text-[#2A183F]">
                    Nome
                </p>
            </div>

            <div class="col-span-3">
                <p class="text-[15px] font-semibold text-[#2A183F]">
                    Telefone
                </p>
            </div>

            <div class="col-span-4">
                <p class="text-[15px] font-semibold text-[#2A183F]">
                    E-mail
                </p>
            </div>

            <div class="col-span-2 text-right">
                <p class="text-[15px] font-semibold text-[#2A183F]">
                    Ações
                </p>
            </div>

        </div>

        <!-- LINHAS -->
        <div>

            @foreach($fornecedores as $fornecedor)

                <div id="fornecedor-{{ $fornecedor->id }}" class="grid grid-cols-12 items-center py-6 border-b border-[#F1F1F1]">

                    <!-- NOME -->
                    <div class="col-span-3">

                        <p class="text-[15px] font-semibold text-[#2A183F]">
                            {{ $fornecedor->nome }}
                        </p>

                    </div>

                    <!-- TELEFONE -->
                    <div class="col-span-3">

                        <p class="text-[15px] text-[#6B6475]">
                            {{ $fornecedor->telefone }}
                        </p>

                    </div>

                    <!-- EMAIL -->
                    <div class="col-span-4">

                        <p class="text-[15px] text-[#6B6475]">
                            {{ $fornecedor->email }}
                        </p>

                    </div>

                    <!-- AÇÕES -->
                    <div class="col-span-2 flex justify-end gap-4">

                        <!-- EDITAR -->
                        <button
                            onclick="abrirModalEditar({{ $fornecedor->id }})"
                            class="text-[#4B2354] hover:text-[#34163A]"
                        >
                            <i data-lucide="pencil" class="w-5 h-5"></i>
                        </button>

                        <!-- EXCLUIR -->
                        <button
                            onclick="excluirFornecedor({{ $fornecedor->id }}, this)"
                            class="text-red-500 hover:text-red-700"
                        >
                            <i data-lucide="trash-2" class="w-5 h-5"></i>
                        </button>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</div>

<!-- MODAL EDITAR -->
<div
    id="modalEditar"
    class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50"
>

    <div class="bg-white w-[500px] rounded-3xl p-8">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-[22px] font-bold text-[#2A183F]">
                Editar fornecedor
            </h2>

            <button
                onclick="fecharModalEditar()"
                class="text-gray-500 hover:text-black text-[20px]"
            >
                ✕
            </button>

        </div>

        <form id="formEditar">

            @csrf
            @method('PUT')

            <input type="hidden" id="edit_id">

            <!-- NOME -->
            <div class="mb-4">

                <label class="block text-[14px] mb-2">
                    Nome
                </label>

                <input
                    type="text"
                    id="edit_nome"
                    class="w-full h-[48px] border rounded-2xl px-4 text-[14px]"
                >

            </div>

            <!-- TELEFONE -->
            <div class="mb-4">

                <label class="block text-[14px] mb-2">
                    Telefone
                </label>

                <input
                    type="text"
                    id="edit_telefone"
                    class="w-full h-[48px] border rounded-2xl px-4 text-[14px]"
                >

            </div>

            <!-- EMAIL -->
            <div class="mb-6">

                <label class="block text-[14px] mb-2">
                    E-mail
                </label>

                <input
                    type="email"
                    id="edit_email"
                    class="w-full h-[48px] border rounded-2xl px-4 text-[14px]"
                >

            </div>

            <button
                type="submit"
                class="w-full h-[50px] bg-[#4B2354] hover:bg-[#34163A] text-white rounded-2xl text-[14px]"
            >
                Salvar alterações
            </button>

        </form>

    </div>

</div>

<script>

function abrirModalEditar(id)
{
    fetch('/fornecedores/' + id + '/edit', {

        headers: {
            'Accept': 'application/json'
        }

    })

    .then(response => response.json())

    .then(data => {

        console.log(data);

        document.getElementById('edit_id').value = data.id;
        document.getElementById('edit_nome').value = data.nome;
        document.getElementById('edit_telefone').value = data.telefone;
        document.getElementById('edit_email').value = data.email;

        document
            .getElementById('modalEditar')
            .classList.remove('hidden');

        document
            .getElementById('modalEditar')
            .classList.add('flex');

    })

    .catch(error => {

        console.log(error);

        alert('Erro ao carregar fornecedor.');

    });
}

function fecharModalEditar()
{
    document
        .getElementById('modalEditar')
        .classList.remove('flex');

    document
        .getElementById('modalEditar')
        .classList.add('hidden');
}

document
.getElementById('formEditar')
.addEventListener('submit', function(e) {

    e.preventDefault();

    const id = document.getElementById('edit_id').value;

    const formData = new FormData();

    formData.append('_method', 'PUT');
    formData.append('_token', '{{ csrf_token() }}');

    formData.append(
        'nome',
        document.getElementById('edit_nome').value
    );

    formData.append(
        'telefone',
        document.getElementById('edit_telefone').value
    );

    formData.append(
        'email',
        document.getElementById('edit_email').value
    );

    fetch('/fornecedores/' + id, {

        method: 'POST',
        body: formData

    })

    .then(response => response.json())

    .then(data => {

        alert(data.message);

        location.reload();

    })

    .catch(error => {

        console.log(error);

        alert('Erro ao atualizar fornecedor.');

    });

});

async function excluirFornecedor(id)
{
    if (!confirm('Deseja excluir este fornecedor?')) {
        return;
    }

    const response = await fetch(`/fornecedores/${id}`, {

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
            .getElementById(`fornecedor-${id}`)
            .remove();

    } else {

        alert(data.message);

    }
}
</script>

@endsection