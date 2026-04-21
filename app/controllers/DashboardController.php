<?php
require_once '../app/models/Paciente.php';
require_once '../app/models/Sintoma.php';
require_once '../app/models/Tratamento.php';

class DashboardController {
    public function index() {
        $pacienteModel = new Paciente();
        $sintomaModel = new Sintoma();
        $tratamentoModel = new Tratamento();

        $pacientes = $pacienteModel->getAll();
        
        $qtdPacientes = count($pacientes);
        $mediaDorGeral = $sintomaModel->getMediaDorGeral();
        $totalTratamentos = $tratamentoModel->getTotalAtivos();
        
        require_once '../app/views/dashboard.php';
    }
}
