<?php ob_start(); ?>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Sintomas Registrados</h1>
    <a href="/sintomas/create" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
        + Registrar Sintoma
    </a>
</div>

<div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
    <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
        <thead>
            <tr class="text-left bg-gray-100">
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Data</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Paciente</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200">Tipo de Dor/Sintoma</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 text-center">Intensidade</th>
                <th class="py-2 px-3 sticky top-0 border-b border-gray-200 text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sintomas as $s): ?>
            <tr>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= date('d/m/Y', strtotime($s['data_registro'])) ?></td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3">
                    <a href="/pacientes/show/<?= $s['paciente_id'] ?>" class="text-blue-600 hover:underline">
                        <?= htmlspecialchars($s['paciente_nome']) ?>
                    </a>
                </td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3"><?= htmlspecialchars($s['tipo']) ?></td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3 text-center">
                    <span class="inline-block rounded-full px-3 py-1 text-sm font-semibold text-gray-700 <?= $s['intensidade'] > 7 ? 'bg-red-200 text-red-800' : ($s['intensidade'] > 4 ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800') ?>">
                        <?= $s['intensidade'] ?>
                    </span>
                </td>
                <td class="border-dashed border-t border-gray-200 py-3 px-3 text-center">
                    <a href="/sintomas/delete/<?= $s['id'] ?>" class="text-red-500 hover:text-red-700 font-bold ml-2" onclick="return confirm('Tem certeza?');">Excluir</a>
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