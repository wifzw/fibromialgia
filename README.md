# 💜 FibroCare - Gestão e Acompanhamento de Pacientes com Fibromialgia

Uma aplicação web completa desenvolvida em **PHP com Apache**, estruturada no padrão **MVC (Model-View-Controller)** e rodando em um ambiente **Docker** com **PostgreSQL**.

---

## 📌 1. Descrição do Projeto

O **FibroCare** tem como objetivo facilitar o gerenciamento e o acompanhamento de pacientes diagnosticados com fibromialgia. A fibromialgia é uma síndrome complexa caracterizada por dores crônicas generalizadas, fadiga e distúrbios do sono. O acompanhamento contínuo e detalhado é fundamental para o sucesso das terapias. 

A aplicação permite o registro de pacientes, o monitoramento contínuo de seus **sintomas** (tipo e intensidade da dor) e a gestão dos **tratamentos** aplicados, promovendo uma visão holística e analítica do quadro clínico do paciente através de dashboards inteligentes.

---

## 🚀 2. Tecnologias Utilizadas

A pilha tecnológica foi cuidadosamente escolhida para fornecer uma base sólida, moderna e performática:

- **PHP 8.2** (Linguagem de backend)
- **Apache** (Servidor Web com `mod_rewrite` habilitado)
- **PostgreSQL 15** (Banco de dados relacional robusto)
- **Docker & Docker Compose** (Containerização e orquestração)
- **Tailwind CSS** (Estilização via CDN para uma interface moderna e responsiva)

---

## 🐳 Por que Docker em vez de XAMPP? (Diferencial)

Em muitos projetos acadêmicos e iniciais, é comum o uso do XAMPP. No entanto, optamos pelo **Docker** pelas seguintes vantagens cruciais:

1. **Isolamento de Ambiente:** O Docker encapsula a aplicação e suas dependências (PHP, extensões, banco de dados) de forma isolada do seu sistema operacional base. Você não precisa instalar nada diretamente na sua máquina além do Docker.
2. **Reprodutibilidade ("Funciona na minha máquina"):** O mesmo código rodará exatamente da mesma forma no computador de qualquer desenvolvedor do time, acabando com as dores de cabeça de incompatibilidade de versões ou variáveis globais corrompidas.
3. **Proximidade com o Ambiente de Produção:** A estrutura montada no `docker-compose.yml` espelha as boas práticas modernas de infraestrutura em nuvem, preparando o código para deploy real.

---

## 🏗️ 3. Arquitetura (Padrão MVC)

O projeto segue rigorosamente a arquitetura **Model-View-Controller**, visando a alta coesão e o baixo acoplamento:

- **M**odels (`/app/models/`): Responsáveis pela lógica de negócio e interação com o banco de dados via `PDO`. Todas as entidades herdam de uma classe abstrata `Model` base para centralização da conexão.
- **V**iews (`/app/views/`): A camada de apresentação (HTML/PHP misto). Tudo é renderizado dentro de um `layout.php` dinâmico estilizado com Tailwind CSS.
- **C**ontrollers (`/app/controllers/`): O cérebro que recebe as requisições, interage com os Models e decide qual View deve ser renderizada.

**Estrutura de Diretórios:**
```text
/
├── app/
│   ├── controllers/   # Regras de roteamento e intermédio de dados
│   ├── models/        # Entidades, CRUD e consultas SQL complexas
│   └── views/         # Interfaces HTML e templates
├── config/            # Configurações globais (ex: Database.php)
├── docker/            # Arquivos do banco de dados (init.sql)
├── public/            # DocumentRoot (Front Controller index.php e CSS/JS)
├── docker-compose.yml # Orquestração dos containers (App e DB)
└── Dockerfile         # Receita da imagem PHP+Apache customizada
```

---

## 🗃️ 4. Modelagem do Banco de Dados

O banco relacional em **PostgreSQL** é composto por 3 tabelas interligadas, todas contendo exclusão em cascata (`ON DELETE CASCADE`):

1. **Pacientes:** `id`, `nome`, `idade`, `sexo` e `data_diagnostico`. Representa o epicentro do sistema.
2. **Sintomas:** `id`, `paciente_id (FK)`, `tipo`, `intensidade (1 a 10)`, `data_registro`.
3. **Tratamentos:** `id`, `paciente_id (FK)`, `descricao`, `tipo`, `data_inicio`.

*Relacionamento: Um Paciente possui Múltiplos (1:N) Sintomas e Tratamentos.*

---

## ⚙️ 5. Como Rodar o Projeto

### Pré-requisitos
- [Docker](https://docs.docker.com/get-docker/) instalado.
- [Docker Compose](https://docs.docker.com/compose/install/) instalado.

### Passo a passo
1. Clone o repositório ou navegue até o diretório raiz do projeto no seu terminal.
2. Inicie e construa os containers rodando o seguinte comando:
   ```bash
   docker-compose up -d --build
   ```
3. O Docker fará o download das imagens, construirá o ambiente e executará os *seeds* automáticos (via `init.sql`) para criar o banco de dados populado.
4. Acesse no seu navegador: **http://localhost:8080**

*(Para parar o projeto, basta rodar: `docker-compose down`)*

---

## 📡 6. Rotas Principais da Aplicação

Utilizamos um Front Controller interno (`public/index.php`) e regras de `.htaccess` para forjar rotas "REST-like" intuitivas:

### Dashboards
- `GET /` -> Dashboard Geral (Resumo de métricas).
- `GET /pacientes/show/{id}` -> Prontuário detalhado do Paciente.

### CRUD (Exemplos)
- `GET /pacientes` -> Listagem de Pacientes.
- `GET/POST /pacientes/create` -> Formulário e inserção de Paciente.
- `GET /pacientes/delete/{id}` -> Exclusão (em cascata).
- `GET /sintomas` -> Listagem do histórico de Sintomas de todos.
- `GET /tratamentos` -> Listagem de Tratamentos ativos.

---

## 📊 7. Funcionalidades

✔️ **CRUD Completo:** Criação, leitura e deleção de Pacientes, Sintomas e Tratamentos.<br >
✔️ **Relacionamentos Seguros:** Ao tentar inserir um Sintoma ou Tratamento o sistema obriga a vinculação a um Paciente existente.<br >
✔️ **Dashboard Global:** Calcula nativamente via SQL o total de pacientes, média de dor geral e métricas de tratamentos ativos.<br >
✔️ **Prontuário Individual Dinâmico:** Visualização do histórico modular do paciente contendo as médias de dor e acesso rápido aos seus sintomas restritos.<br >
✔️ **Validação de Dados:** Rejeição centralizada de intensidade de dor fora da escala 1 a 10.

---

## 🎨 8. Interface

O layout foi desenhado visando simplicidade (Clean Design). A aplicação possui um **Navbar Header Global** constante contendo os atalhos vitais. O painel (Dashboard) emprega grid interativo (Cartões/Cards informativos). Telas de listagem utilizam **tabelas padronizadas** fáceis de ler, com botões bem sinalizados com códigos de cores funcionais (Ex: vermelho para Excluir e aviso de confirmação JS nativo).

## Dashboard
<img width="1862" height="946" alt="image" src="https://github.com/user-attachments/assets/edeff772-5462-49bb-ba09-387605d39754" />

## Prontuário do Paciente
<img width="1866" height="945" alt="image" src="https://github.com/user-attachments/assets/e599cc66-a659-4d2c-9049-d9f21f414d18" />



---

## 🧪 9. Possíveis Melhorias Futuras

- **Autenticação de Usuários:** Inserir sistema de login (Médicos/Enfermeiros) utilizando sessões (`$_SESSION`) para proteção de rotas.
- **RESTful API Native:** Modularizar os retornos do Controller para `JSON`, desacoplando as Views front-end para usar *React* ou *Vue.js*.
- **Testes Automatizados:** Implementar testes unitários e de integração utilizando *PHPUnit*.
- **Deploy em Nuvem:** Hospedar as instâncias Dockerizadas nativamente na AWS ECS ou DigitalOcean.
- **Paginação:** Implementar sistema de listagem páginada nas requisições do DB para lidar com milhares de prontuários.

---

## 👨‍💻 10. Autores

Desenvolvido por:
- **Kauan Correia Motta** - [[GitHub](https://github.com/wifzw)]
- **Micaela Lopes** - [[GitHub](https://github.com/miiicaela)]
