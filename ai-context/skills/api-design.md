# Habilidade: Design de API (api-design.md)

**Descrição da Skill:** 
Se orientada a expandir a plataforma para uma arquitetura "Headless", a IA deve saber orquestrar rotas de API em PHP puro acoplado com banco relacional com resiliência.

**O que a IA deve saber fazer:**
- Deixar a Renderização de View de Lado e passar a manipular HTTP Headers e codificação JSON pura (`json_encode`).
- Construir ou adaptar um subconjunto de Endpoints em `app/controllers/Api` ou similar.

**Passo a Passo (Workflow):**
1. Modificar os cabeçalhos (`header('Content-Type: application/json')`).
2. Interceptar a Request (verbo HTTP explícito: `GET`, `POST`, `PUT`, `DELETE`).
3. Retornar status codes apropriados: `200 OK`, `201 Created`, `400 Bad Request`, `404 Not Found`.

**Exemplos Práticos:**
```php
public function fetchSintomasPorPaciente($paciente_id) {
    header('Content-Type: application/json');
    $sintomas = $this->sintomaModel->getByPaciente($paciente_id);
    if ($sintomas) {
        http_response_code(200);
        echo json_encode(['data' => $sintomas, 'success' => true]);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Nenhum sintoma encontrado']);
    }
    exit;
}
```