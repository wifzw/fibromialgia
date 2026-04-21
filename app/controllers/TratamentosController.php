<?php
require_once '../app/models/Tratamento.php';
require_once '../app/models/Paciente.php';

class TratamentosController {
    private $model;
    private $pacienteModel;

    public function __construct() {
        $this->model = new Tratamento();
        $this->pacienteModel = new Paciente();
    }

    public function index() {
        $tratamentos = $this->model->getAll();
        require_once '../app/views/tratamentos/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validação simples (Poderíamos validar tamanho dos campos etc)
            if (!empty(trim($_POST['descricao'])) && !empty(trim($_POST['tipo']))) {
                $this->model->create($_POST);
                
                if (isset($_POST['redirect_to_paciente']) && $_POST['redirect_to_paciente'] == '1') {
                    header('Location: /pacientes/show/' . $_POST['paciente_id']);
                } else {
                    header('Location: /tratamentos');
                }
                exit;
            }
        }
        
        $pacientes = $this->pacienteModel->getAll();
        $preselectedId = isset($_GET['paciente_id']) ? $_GET['paciente_id'] : null;
        
        require_once '../app/views/tratamentos/create.php';
    }

    public function delete($id) {
        if ($id) {
            $this->model->delete($id);
        }
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/tratamentos';
        header("Location: $referer");
        exit;
    }
}
