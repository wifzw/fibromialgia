# Habilidade: Geração de CRUDs (crud-generation.md)

**Descrição da Skill:** 
A IA deve dominar a arte de construir o ciclo de vida completo de uma nova Entidade no FibroCare (Create, Read, Update, Delete) em milissegundos seguindo nossa arquitetura.

**O que a IA deve saber fazer:**
Mapear a recepção de uma nova entidade (ex: `Exames`) gerando os 4 artefatos principais abaixo sem ferir a integridade do design pattern atual.

**Passo a Passo (Workflow de execução da IA):**
1. **Model:** Criar a classe (`app/models/Exame.php`) estendendo de genérica `Model`, injetando as querys preparadas PDO para as operações `getAll()`, `getById()`, `create()`, `update()`, `delete()`.
2. **Controller:** Criar `ExamesController.php`, instanciar o Model `$this->model = new Exame()`, e criar as ações públicas `index()`, `create()`, `delete($id)`. Tratar validações.
3. **Views:** Criar o diretório `/app/views/exames/` e lá dentro depositar:
   - `index.php` (tabela de listagem).
   - `create.php` (formulário estilizado do Tailwind atrelado a um POST endpoint).
4. **Layout:** Editar `/app/views/layout.php` inserindo o link da nova aba no Header NavBar do sistema se solicitado.

**Exemplo de Output:**
Fornecer os arquivos isolados e garantir coerência com a tabela em banco (ex: sugerir script `.sql` das novas `tables` se ainda não existirem).