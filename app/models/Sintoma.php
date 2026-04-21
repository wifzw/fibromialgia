<?php
require_once '../app/models/Model.php';

class Sintoma extends Model {
    public function getAll() {
        $stmt = $this->conn->query("
            SELECT s.*, p.nome as paciente_nome 
            FROM sintomas s 
            JOIN pacientes p ON s.paciente_id = p.id 
            ORDER BY s.data_registro DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByPaciente($paciente_id) {
        $stmt = $this->conn->prepare("SELECT * FROM sintomas WHERE paciente_id = :paciente_id ORDER BY data_registro DESC");
        $stmt->execute(['paciente_id' => $paciente_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($dados) {
        $stmt = $this->conn->prepare("INSERT INTO sintomas (paciente_id, tipo, intensidade, data_registro) VALUES (:paciente_id, :tipo, :intensidade, :data_registro)");
        return $stmt->execute([
            'paciente_id' => $dados['paciente_id'],
            'tipo' => $dados['tipo'],
            'intensidade' => $dados['intensidade'],
            'data_registro' => $dados['data_registro']
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM sintomas WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getMediaDorGeral() {
        $stmt = $this->conn->query("SELECT AVG(intensidade) FROM sintomas");
        return round((float)$stmt->fetchColumn(), 1);
    }

    public function getMediaDorPorPaciente($paciente_id) {
        $stmt = $this->conn->prepare("SELECT AVG(intensidade) FROM sintomas WHERE paciente_id = :paciente_id");
        $stmt->execute(['paciente_id' => $paciente_id]);
        return round((float)$stmt->fetchColumn(), 1);
    }
}
