# Regras do Padrão MVC (mvc.md)

**Descrição:** 
A aplicação **FibroCare** roda puramente através da Arquitetura MVC (Model-View-Controller). Deve haver uma estrita separação de interesses (SoC).

**Regras Específicas:**

1. **Controller (O Maestro):**
   - Deve ser responsável por receber o Request HTTP, chamar os métodos do Model e despachar os resultados para as Views corretas através do `require_once`.
   - NUNCA pode ter scripts SQL nele.
   
2. **Model (O Especialista):**
   - É a única camada com direito autoral de se comunicar com o `Database`.
   - Estende o arquivo `Model.php` base e utiliza e injeta a rotina `$this->conn` para rodar PDO.

3. **View (A Vitrine):**
   - Mistura de HTML com snippets de PHP enxutos apenas voltados para iteração (`foreach` do PHP) ou impressão rápida (`<?= $var ?>`).
   - Usa obrigatoriamente a captura de buffer (`ob_start()` ... `$content = ob_get_clean(); require 'layout.php';`).

**Exemplo Prático (SoC correto):**
```php
// NO CONTROLLER (Bom!)
public function index() {
    $model = new Sintoma();
    $sintomas = $model->getAll(); // Model faz o trabalho pesado
    require_once '../app/views/sintomas/index.php'; // View joga na tela
}
```

**Anti-patterns (O que NÃO fazer):**
```php
// RUIM: SQL no Controller e Echo direto!
public function index() {
    $db = Database::getConnection();
    $sintomas = $db->query("SELECT * FROM sintomas");
    echo "<h1>Lista:</h1>";
    // ...
}
```