<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FibroCare - Gestão de Pacientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <nav class="bg-blue-800 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-2xl font-bold">FibroCare</a>
            <div>
                <a href="/" class="text-blue-200 hover:text-white px-3">Dashboard</a>
                <a href="/pacientes" class="text-blue-200 hover:text-white px-3">Pacientes</a>
                <a href="/sintomas" class="text-blue-200 hover:text-white px-3">Sintomas</a>
                <a href="/tratamentos" class="text-blue-200 hover:text-white px-3">Tratamentos</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-4 mt-8 bg-white shadow rounded">
        <?= $content ?>
    </div>
</body>
</html>
