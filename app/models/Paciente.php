<?php
require_once '../app/models/Model.php';

class Paciente extends Model {
    public function getAll() {
        $stmt = $this->conn->query("SELECT * FROM pacientes ORDER BY data_diagnostico DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM pacientes WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($dados) {
        $stmt = $this->conn->prepare("INSERT INTO pacientes (nome, idade, sexo, data_diagnostico) VALUES (:nome, :idade, :sexo, :data_diagnostico)");
        return $stmt->execute([
            'nome' => $dados['nome'],
            'idade' => $dados['idade'],
            'sexo' => $dados['sexo'],
            'data_diagnostico' => $dados['data_diagnostico']
        ]);
    }

    public function update($id, $dados) {
        $stmt = $this->conn->prepare("UPDATE pacientes SET nome = :nome, idade = :idade, sexo = :sexo, data_diagnostico = :data_diagnostico WHERE id = :id");
        return $stmt->execute([
            'id' => $id,
            'nome' => $dados['nome'],
            'idade' => $dados['idade'],
            'sexo' => $dados['sexo'],
            'data_diagnostico' => $dados['data_diagnostico']
        ]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM pacientes WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getTotal() {
        $stmt = $this->conn->query("SELECT COUNT(*) FROM pacientes");
        return $stmt->fetchColumn();
    }
}
