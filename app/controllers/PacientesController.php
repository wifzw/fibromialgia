<?php
require_once '../app/models/Paciente.php';
require_once '../app/models/Sintoma.php';
require_once '../app/models/Tratamento.php';

class PacientesController {
    private $model;
    private $sintomaModel;
    private $tratamentoModel;

    public function __construct() {
        $this->model = new Paciente();
        $this->sintomaModel = new Sintoma();
        $this->tratamentoModel = new Tratamento();
    }

    public function index() {
        $pacientes = $this->model->getAll();
        require_once '../app/views/pacientes/index.php';
    }

    public function show($id) {
        if (!$id) {
            header('Location: /pacientes');
            exit;
        }

        $paciente = $this->model->getById($id);
        if (!$paciente) {
            header('Location: /pacientes');
            exit;
        }

        $sintomas = $this->sintomaModel->getByPaciente($id);
        $tratamentos = $this->tratamentoModel->getByPaciente($id);
        
        // Calcular médias ou somatórias para dashboard
        $mediaDor = $this->sintomaModel->getMediaDorPorPaciente($id);

        require_once '../app/views/pacientes/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST);
            header('Location: /pacientes');
            exit;
        }
        require_once '../app/views/pacientes/create.php';
    }

    public function delete($id) {
        if ($id) {
            $this->model->delete($id);
        }
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/pacientes';
        header("Location: $referer");
        exit;
    }
}
