<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite('resources/css/app.css')

    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-[#F8F8F8]">

<div class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    @include('components.sidebar')

    <!-- CONTEÚDO -->
    <main class="flex-1 overflow-y-auto p-10">

        @yield('content')

    </main>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html>