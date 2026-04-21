<?php ob_start(); ?>

<h1 class="text-3xl font-bold text-gray-800 mb-6">Registrar Sintoma</h1>

<?php if (!empty($error)): ?>
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">Erro!</strong>
    <span class="block sm:inline"><?= htmlspecialchars($error) ?></span>
</div>
<?php endif; ?>

<form action="/sintomas/create" method="POST" class="bg-white px-8 pt-6 pb-8 mb-4 shadow rounded">
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
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo">Tipo do Sintoma (Ex: Fadiga, Dor articular)</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="tipo" name="tipo" type="text" required>
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="intensidade">Intensidade (1 a 10)</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="intensidade" name="intensidade" type="number" min="1" max="10" required>
        </div>
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="data_registro">Data do Registro</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" id="data_registro" name="data_registro" type="date" value="<?= date('Y-m-d') ?>" required>
    </div>

    <!-- Controle de redirecionamento interno se vier do dashboard -->
    <?php if ($preselectedId): ?>
        <input type="hidden" name="redirect_to_paciente" value="1">
    <?php endif; ?>

    <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
            Salvar
        </button>
        <a class="text-gray-500 hover:text-gray-800" href="<?= $preselectedId ? '/pacientes/show/'.$preselectedId : '/sintomas' ?>">
            Cancelar
        </a>
    </div>
</form>

<?php 
$content = ob_get_clean();
require '../app/views/layout.php';
?>