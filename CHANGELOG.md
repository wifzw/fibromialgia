# Changelog

Todas as mudanças relevantes deste projeto serão documentadas aqui.

O formato segue o padrão Keep a Changelog
e este projeto utiliza Versionamento Semântico.

## [Unreleased]

*(Nenhuma alteração pendente de lançamento nesta versão. Funcionalidades futuras planejadas: Autenticação, API REST, Testes automatizados e Deploy em Cloud).*

## [1.3.0] - 2026-04-15

### Added
- Criação e integração da classe `BaseModel` (`app/models/Model.php`) visando unificar instâncias do PDO.
- Padronização no roteamento dentro de `public/index.php`, canalizando as requisições para os controllers com maior previsibilidade.

### Refactored
- Centralização da configuração com o PostgreSQL através do arquivo unificado `config/Database.php`.
- Refatoração profunda em todos os Controllers (ex: `PacientesController.php`, `SintomasController.php`) visando garantir controllers mais "leves", repassando a gestão lógica para o Model.
- Adequação das Views para garantir suporte absoluto a outputs sem inclusão de `echo` direto nos controllers, padronizando o buffer de saída iterativo com `ob_start()`.

## [1.2.0] - 2026-03-20

### Added
- Novo Painel de Controle (Dashboard) e `DashboardController.php`, apresentando volumetria de dados.
- Algoritmo de cruzamento de dados para calcular e exibir métricas avançadas, como a intensidade média de dor baseada na escala padronizada.
- Implementação de barreiras de validação de dados seguras contra injeção e dados atípicos na camada de controle (assegurando que métricas de dor restrinjam-se ao intervalo rigoroso de 1 a 10).

### Changed
- Aperfeiçoamento geral do Web Design utilizando e integrando TailwindCSS no `app/views/layout.php`.
- Otimização da UX (User Experience) mediante feedbacks visuais e validação clara nos formulários de criação.

## [1.1.0] - 2026-02-10

### Added
- CRUD completo e funcional para o gerenciamento de Sintomas (`Sintoma.php`, `SintomasController.php` e visões associadas).
- CRUD completo e funcional para acompanhamento de Tratamentos (`Tratamento.php`, `TratamentosController.php` e visões associadas).
- Modelagem de relacionamento a nível de banco de dados garantindo a dependência e listagem apropriada de Sintomas e Tratamentos atrelados aos Pacientes registrados.
- Adição de novos menus e links no header principal para navegação fluida entre os domínios da aplicação.

## [1.0.0] - 2026-01-05

### Added
- Definição da arquitetura base do sistema utilizando o paradigma MVC purista com PHP Clássico.
- Configuração de containeres locais estáveis englobando Apache e PHP através do `Dockerfile` e do `docker-compose.yml`.
- Schema unificado inicial de construção do banco de dados no PostgreSQL localizado em `docker/init.sql`.
- Segurança fundamental na camada de dados por meio da utilização de transações e Prepared Statements do PDO.
- Implementação do CRUD primordial da entidade Pacientes, dispondo de rotas completas para indexação, apresentação única e criação contínua.