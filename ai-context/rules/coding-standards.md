# Padrões de Código (coding-standards.md)

**Descrição:** 
Regras baseadas nas recomendações modernas da comunidade PHP e PSR-12, focadas em legibilidade e segurança.

**Regras de Sintaxe e Estrutura:**
1. Classes começam com letra maiúscula (PascalCase), assim como o nome do arquivo (`Sintoma.php`, `SintomasController.php`).
2. Métodos e variáveis são criados em `camelCase`.
3. Indentação é feita em 4 espaços.
4. Chaves abrem na mesma linha para métodos e estruturas de controle.

**Regras de Segurança (Database PDO):**
- Utilizar **SEMPRE** `$stmt = $this->conn->prepare(...)` seguido de `$stmt->execute([...])` se a query receber qualquer parâmetro vindo do front-end (`$_POST`, `$_GET`, `$_SESSION`).

**Exemplo Prático:**
```php
public function getById(int $id): array|bool {
    $stmt = $this->conn->prepare("SELECT * FROM pacientes WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
```

**Anti-patterns:**
- Concatenar e injetar variáveis diretamente no query string SQL (`$query = "SELECT * FROM pacientes WHERE id = " . $_GET['id'];`). Isso expõe a aplicação à injeção SQL instantânea.