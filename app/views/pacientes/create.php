<?php ob_start(); ?>

<h1 class="text-3xl font-bold text-gray-800 mb-6">Novo Paciente</h1>

<form action="/pacientes/create" method="POST" class="bg-white px-8 pt-6 pb-8 mb-4 shadow rounded">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">Nome Completo</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" name="nome" type="text" required>
    </div>
    
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="idade">Idade</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="idade" name="idade" type="number" required>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="sexo">Sexo</label>
            <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sexo" name="sexo" required>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>
        </div>
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="data_diagnostico">Data do Diagnóstico</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="data_diagnostico" name="data_diagnostico" type="date" required>
    </div>

    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Salvar
        </button>
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="/pacientes">
            Cancelar
        </a>
    </div>
</form>

<?php 
$content = ob_get_clean();
require '../app/views/layout.php';
?>