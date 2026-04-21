<?php
require_once '../app/models/Model.php';

class Tratamento extends Model {
    public function getAll() {
        $stmt = $this->conn->query("
            SELECT t.*, p.nome as paciente_nome 
            FROM tratamentos t 
            JOIN pacientes p ON t.paciente_id = p.id 
            ORDER BY t.data_inicio DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByPaciente($paciente_id) {
        $stmt = $this->conn->prepare("SELECT * FROM tratamentos WHERE paciente_id = :paciente_id ORDER BY data_inicio DESC");
        $stmt->execute(['paciente_id' => $paciente_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($dados) {
        $stmt = $this->conn->prepare("INSERT INTO tratamentos (paciente_id, descricao, tipo, data_inicio) VALUES (:paciente_id, :descricao, :tipo, :data_inicio)");
        return $stmt->execute([
            'paciente_id' => $dados['paciente_id'],
            'descricao' => $dados['descricao'],
            'tipo' => $dados['tipo'],
            'data_inicio' => $dados['data_inicio']
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM tratamentos WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getTotalAtivos() {
        $stmt = $this->conn->query("SELECT COUNT(*) FROM tratamentos");
        return $stmt->fetchColumn();
    }
}
