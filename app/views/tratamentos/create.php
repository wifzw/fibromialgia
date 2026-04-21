<?php ob_start(); ?>

<h1 class="text-3xl font-bold text-gray-800 mb-6">Cadastrar Tratamento</h1>

<form action="/tratamentos/create" method="POST" class="bg-white px-8 pt-6 pb-8 mb-4 shadow rounded">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="paciente_id">Paciente</label>
        <select class="shadow border rounded w-full py-2 px-3 text-gray-700" id="paciente_id" name="paciente_id" required>
            <option value="">Selecione um paciente...</option>
            <?php foreach ($pacientes as $p): ?>
                <option value="<?= $p['id'] ?>" <?= $preselectedId == $p['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($p['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo">Tipo (ex: Medicação, Terapia, Exercício)</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="tipo" name="tipo" type="text" required>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="data_inicio">Data de Início</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="data_inicio" name="data_inicio" type="date" value="<?= date('Y-m-d') ?>" required>
        </div>
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="descricao">Descrição ou Posologia</label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 h-24" id="descricao" name="descricao" required></textarea>
    </div>

    <!-- Controle de redirecionamento interno se vier do dashboard -->
    <?php if ($preselectedId): ?>
        <input type="hidden" name="redirect_to_paciente" value="1">
    <?php endif; ?>

    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
            Salvar Tratamento
        </button>
        <a class="text-gray-500 hover:text-gray-800" href="<?= $preselectedId ? '/pacientes/show/'.$preselectedId : '/tratamentos' ?>">
            Cancelar
        </a>
    </div>
</form>

<?php 
$content = ob_get_clean();
require '../app/views/layout.php';
?>