# Validação de Dados (validation.md)

**Descrição:** 
A aplicação trabalha com dados sensíveis de pacientes hospitalares. Todas as solicitações externas (via `$POST` ou `$GET`) precisam passar por filtros e sanitização adequados antes de tocarem as Model classes e entrarem no banco de dados.

**Regras Essenciais:**
1. Verifique sempre se há dados esperados antes de prosseguir usando `empty()` ou `trim($_POST['campo'])`.
2. Para dados numéricos contínuos (como ID do paciente e intensidade da dor), realize o "caching" (`(int)$_POST['id']`) ou verifique com `is_numeric()`.
3. A regra de negócio imperativa manda: A **Intensidade da Dor dos Sintomas** deve estritamente varrer uma escala **> 0** e **<= 10**.

**Exemplo de Validação no Controller:**
```php
$intensidade = (int)$_POST['intensidade'];
if ($intensidade < 1 || $intensidade > 10) {
    $error = 'A intensidade deve ser na escala de 1 a 10.';
    // Envia o erro para View...
    return;
}
```

**Anti-patterns:**
- Confiar somente em `required` ou `<input type="number" min="1">` no front-end em HTML, e não revalidar estes dados na camada do servidor/Controller.