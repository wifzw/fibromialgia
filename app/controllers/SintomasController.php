<?php
require_once '../app/models/Sintoma.php';
require_once '../app/models/Paciente.php';

class SintomasController {
    private $model;
    private $pacienteModel;

    public function __construct() {
        $this->model = new Sintoma();
        $this->pacienteModel = new Paciente();
    }

    public function index() {
        $sintomas = $this->model->getAll();
        require_once '../app/views/sintomas/index.php';
    }

    public function create() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $intensidade = (int)$_POST['intensidade'];
            
            // Validação
            if ($intensidade < 1 || $intensidade > 10) {
                $error = 'A intensidade deve ser entre 1 e 10.';
            } else {
                $this->model->create($_POST);
                if (isset($_POST['redirect_to_paciente']) && $_POST['redirect_to_paciente'] == '1') {
                    header('Location: /pacientes/show/' . $_POST['paciente_id']);
                } else {
                    header('Location: /sintomas');
                }
                exit;
            }
        }
        
        $pacientes = $this->pacienteModel->getAll();
        $preselectedId = isset($_GET['paciente_id']) ? $_GET['paciente_id'] : null;
        
        require_once '../app/views/sintomas/create.php';
    }

    public function delete($id) {
        if ($id) {
            $this->model->delete($id);
        }
        // Tentamos voltar de onde veio (Referer) ou para listagem.
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/sintomas';
        header("Location: $referer");
        exit;
    }
}
