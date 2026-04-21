-- Estrutura do Banco de Dados para o Sistema de Fibromialgia

CREATE TABLE pacientes (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    idade INT NOT NULL,
    sexo CHAR(1) NOT NULL,
    data_diagnostico DATE NOT NULL
);

CREATE TABLE sintomas (
    id SERIAL PRIMARY KEY,
    paciente_id INT NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    intensidade INT NOT NULL CHECK (intensidade >= 1 AND intensidade <= 10),
    data_registro DATE NOT NULL,
    CONSTRAINT fk_paciente FOREIGN KEY (paciente_id) REFERENCES pacientes(id) ON DELETE CASCADE
);

CREATE TABLE tratamentos (
    id SERIAL PRIMARY KEY,
    paciente_id INT NOT NULL,
    descricao TEXT NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    data_inicio DATE NOT NULL,
    CONSTRAINT fk_paciente_tratamento FOREIGN KEY (paciente_id) REFERENCES pacientes(id) ON DELETE CASCADE
);

-- Inserindo alguns dados iniciais (Seed)
INSERT INTO pacientes (nome, idade, sexo, data_diagnostico) VALUES 
('Maria da Silva', 45, 'F', '2023-01-15'),
('João Souza', 52, 'M', '2022-11-20');

INSERT INTO sintomas (paciente_id, tipo, intensidade, data_registro) VALUES 
(1, 'Dor Crônica', 8, '2024-04-20'),
(1, 'Fadiga', 9, '2024-04-21'),
(2, 'Dor', 7, '2024-04-21');

INSERT INTO tratamentos (paciente_id, descricao, tipo, data_inicio) VALUES
(1, 'Sessões semanais de fisioterapia', 'Terapia', '2023-02-01'),
(1, 'Pregabalina 75mg', 'Medicação', '2023-01-20'),
(2, 'Exercícios aeróbicos leves 3x semana', 'Exercício', '2022-12-01');
