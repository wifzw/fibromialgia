<?php ob_start(); ?>

<!-- Cabelho do Dashboard do Paciente -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">
        Prontuário: <span class="text-blue-600"><?= htmlspecialchars($paciente['nome']) ?></span>
    </h1>
    <a href="/pacientes" class="text-gray-600 hover:text-gray-800 flex items-center mb-4">
        &larr; Voltar
    </a>
</div>

<div class="bg-white p-6 rounded shadow mb-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div>
            <p class="text-sm text-gray-500">Idade</p>
            <p class="text-lg font-bold"><?= $paciente['idade'] ?> anos</p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Sexo</p>
            <p class="text-lg font-bold"><?= $paciente['sexo'] === 'F' ? 'Feminino' : 'Masculino' ?></p>
        </div>
        <div>
            <p class="text-sm text-gray-500">Data do Diagnóstico</p>
            <p class="text-lg font-bold"><?= date('d/m/Y', strtotime($paciente['data_diagnostico'])) ?></p>
        </div>
        <div class="bg-red-50 p-3 rounded border border-red-200 text-center">
            <p class="text-sm text-red-500 font-bold mb-1">Média de Dor</p>
            <p class="text-2xl font-bold text-red-600"><?= $mediaDor ? number_format($mediaDor, 1) : '--' ?> / 10</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <!-- Bloco de Sintomas -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Histórico de Sintomas</h2>
            <a href="/sintomas/create?paciente_id=<?= $paciente['id'] ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-bold py-1 px-3 rounded">
                + Registrar Sintoma
            </a>
        </div>
        
        <?php if (!empty($sintomas)): ?>
            <ul class="divide-y divide-gray-200 border-t border-gray-200">
                <?php foreach ($sintomas as $sintoma): ?>
                <li class="py-3 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-gray-800"><?= htmlspecialchars($sintoma['tipo']) ?></p>
                        <p class="text-sm text-gray-500"><?= date('d/m/Y', strtotime($sintoma['data_registro'])) ?></p>
                    </div>
                    <div class="flex items-center">
                        <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Intensidade: <?= $sintoma['intensidade'] ?></span>
                        <a href="/sintomas/delete/<?= $sintoma['id'] ?>" class="text-red-500 hover:text-red-700 ml-2 text-sm" onclick="return confirm('Deseja excluir este sintoma?')">Excluir</a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-gray-500 italic">Nenhum sintoma registrado.</p>
        <?php endif; ?>
    </div>

    <!-- Bloco de Tratamentos -->
    <div class="bg-white p-6 rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Tratamentos Ativos</h2>
            <a href="/tratamentos/create?paciente_id=<?= $paciente['id'] ?>" class="bg-green-500 hover:bg-green-600 text-white text-sm font-bold py-1 px-3 rounded">
                + Novo Tratamento
            </a>
        </div>
        
        <?php if (!empty($tratamentos)): ?>
            <ul class="divide-y divide-gray-200 border-t border-gray-200">
                <?php foreach ($tratamentos as $tratamento): ?>
                <li class="py-3 flex justify-between items-center">
                    <div>
                        <p class="font-bold text-gray-800"><?= htmlspecialchars($tratamento['descricao']) ?></p>
                        <p class="text-sm text-gray-600"><?= htmlspecialchars($tratamento['tipo']) ?> - Início: <?= date('d/m/Y', strtotime($tratamento['data_inicio'])) ?></p>
                    </div>
                    <div>
                        <a href="/tratamentos/delete/<?= $tratamento['id'] ?>" class="text-red-500 hover:text-red-700 text-sm ml-2" onclick="return confirm('Deseja cancelar/excluir este tratamento?')">Excluir</a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-gray-500 italic">Nenhum tratamento registrado.</p>
        <?php endif; ?>
    </div>
</div>

<?php 
$content = ob_get_clean();
require '../app/views/layout.php';
?>