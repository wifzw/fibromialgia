<?php ob_start(); ?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Tratamentos em Andamento</h1>
    <a href="/tratamentos/create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
        + Novo Tratamento
    </a>
</div>

<div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
        <thead>
            <tr class="text-left bg-gray-100">
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Início</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Paciente</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Descrição / Medicação</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Tipo</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tratamentos as $t): ?>
            <tr>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= date('d/m/Y', strtotime($t['data_inicio'])) ?></td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3">
                    <a href="/pacientes/show/<?= $t['paciente_id'] ?>" class="text-blue-600 hover:underline">
                        <?= htmlspecialchars($t['paciente_nome']) ?>
                    </a>
                </td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= htmlspecialchars($t['descricao']) ?></td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= htmlspecialchars($t['tipo']) ?></td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3 text-center">
                    <a href="/tratamentos/delete/<?= $t['id'] ?>" class="text-red-500 hover:text-red-700 font-bold ml-2" onclick="return confirm('Você confirma a remoção?');">Excluir</a>
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