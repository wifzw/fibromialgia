<?php ob_start(); ?>

<h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="p-6 bg-blue-100 rounded-lg border border-blue-200 shadow-sm">
        <h2 class="text-xl font-semibold text-blue-800 mb-2">Total de Pacientes</h2>
        <p class="text-4xl font-bold text-blue-600"><?= $qtdPacientes ?></p>
    </div>
    <div class="p-6 bg-red-100 rounded-lg border border-red-200 shadow-sm">
        <h2 class="text-xl font-semibold text-red-800 mb-2">Média de Dor Geral</h2>
        <p class="text-4xl font-bold text-red-600"><?= $mediaDorGeral ? number_format($mediaDorGeral, 1) : '--' ?> / 10</p>
    </div>
    <div class="p-6 bg-green-100 rounded-lg border border-green-200 shadow-sm">
        <h2 class="text-xl font-semibold text-green-800 mb-2">Tratamentos Ativos</h2>
        <p class="text-4xl font-bold text-green-600"><?= $totalTratamentos ?></p>
    </div>
</div>

<h2 class="text-2xl font-semibold text-gray-700 mb-4">Pacientes Recentes</h2>
<table class="min-w-full bg-white border">
    <thead>
        <tr class="bg-gray-50 text-gray-600 text-left text-sm uppercase font-semibold">
            <th class="py-3 px-4 border-b">ID</th>
            <th class="py-3 px-4 border-b">Nome</th>
            <th class="py-3 px-4 border-b">Data Diagnóstico</th>
        </tr>
    </thead>
    <tbody class="text-gray-700">
        <?php foreach ($pacientes as $paciente): ?>
        <tr>
            <td class="py-3 px-4 border-b"><?= $paciente['id'] ?></td>
            <td class="py-3 px-4 border-b"><?= htmlspecialchars($paciente['nome']) ?></td>
            <td class="py-3 px-4 border-b"><?= date('d/m/Y', strtotime($paciente['data_diagnostico'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
require 'layout.php';
?>
