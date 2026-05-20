<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen p-10">

    <div class="flex justify-between items-center mb-10">

        <h1 class="text-4xl font-bold">
            Dashboard
        </h1>

        <form action="/logout" method="POST">
            @csrf

            <button class="bg-red-500 text-white px-5 py-2 rounded-xl">
                Sair
            </button>
        </form>

    </div>

    <div class="bg-white rounded-2xl shadow p-10">
        <h2 class="text-2xl font-semibold mb-4">
            Login realizado com sucesso 🎉
        </h2>

        <p>
            Usuário autenticado:
            <strong>{{ auth()->user()->nome }}</strong>
        </p>
    </div>

</body>
</html>