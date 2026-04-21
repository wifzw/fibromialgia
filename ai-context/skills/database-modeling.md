# Habilidade: Modelagem de Banco de Dados (database-modeling.md)

**Descrição da Skill:**
Capacidade da IA de gerar esquemas DML/DDL complexos no contexto da saúde (Fibromialgia) focados na resiliência do Postgres.

**O que a IA deve saber fazer:**
1. Pensar de maneira "Totalmente Normalizada (FN1, FN2, FN3)".
2. Elaborar arquiteturas que permitam métricas estatísticas fáceis (ex: `AVG()` da dor x dia da semana).
3. Escalar relacionamento e garantir constraints limpas (uso do `ON DELETE CASCADE` para não poluir o sistema ao apagar o nó pai).

**Exemplo Adicional - Inserindo uma tabela de 'Consultas':**
```sql
CREATE TABLE consultas (
    id SERIAL PRIMARY KEY,
    paciente_id INT NOT NULL,
    data_agendamento TIMESTAMP NOT NULL,
    observacoes TEXT,
    CONSTRAINT fk_paciente_consulta 
       FOREIGN KEY (paciente_id) 
       REFERENCES pacientes(id) 
       ON DELETE CASCADE
);
```