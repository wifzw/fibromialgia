<?php ob_start(); ?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Gerenciar Pacientes</h1>
    <a href="/pacientes/create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
        + Novo Paciente
    </a>
</div>

<div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
        <thead>
            <tr class="text-left bg-gray-100">
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">ID</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Nome</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Idade</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Sexo</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pacientes as $p): ?>
            <tr>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= $p['id'] ?></td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= htmlspecialchars($p['nome']) ?></td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= $p['idade'] ?> anos</td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= $p['sexo'] ?></td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3 text-center">
                    <a href="/pacientes/show/<?= $p['id'] ?>" class="text-blue-500 hover:text-blue-700 font-bold">Ver / Gerenciar</a>
                    <a href="/pacientes/delete/<?= $p['id'] ?>" class="text-red-500 hover:text-red-700 font-bold ml-4" onclick="return confirm('Tem certeza que deseja deletar?');">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php 
$content = ob_get_clean();
require '../app/views/layout.php';
?>