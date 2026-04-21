# 🤖 Contexto para Inteligência Artificial (AI Context)

Esta pasta (`/ai-context`) contém a **base de conhecimento** do projeto **FibroCare**. O objetivo é padronizar e parametrizar as respostas de agentes de Inteligência Artificial (como GitHub Copilot, ChatGPT, Claude, etc.) para que entendam o domínio do problema, a stack tecnológica e as decisões arquiteturais tomadas na aplicação.

---

## 🎯 Por que isso existe?
IAs generativas podem sugerir códigos que não seguem o padrão arquitetural do projeto (ex: usar MySQL quando usamos PostgreSQL, ou criar SQL Injection quando já usamos PDO). Este repositório de regras e papéis garante que a IA atue estritamente dentro das nossas necessidades técnicas e de negócios.

---

## 📁 Estrutura deste Diretório

*   `/agents/` - **Papéis Especializados:** Define *quem* a IA deve ser (Arquiteto, Desenvolvedor PHP, Engenheiro de DB, Front-end).
*   `/rules/` - **Regras do Projeto:** Como codificar, como usar o MVC, padrões do Docker e regras de validação.
*   `/skills/` - **Habilidades Esperadas:** Como executar tarefas específicas (ex: gerar um novo CRUD do zero).
*   `/context/` - **Domínio do Problema:** Explicação sobre o que é a fibromialgia e como o sistema se comporta a nível de negócio.

---

## 🚀 Diferencial: Como usar este contexto na sua ferramenta de IA?

Para garantir que a IA mantenha a consistência, **sempre forneça o contexto antes de solicitar código**. Você pode fazer isso de algumas formas:

### 1. No ChatGPT / Claude (Prompt de Inicialização)
Copie o conteúdo dos arquivos essenciais (ex: `context/business-rules.md`, `rules/mvc.md` e o `agent` desejado) e cole como a primeira mensagem de uma nova conversa.
**Exemplo de Prompt:**
> "Atue como o perfil descrito em `agents/php-developer.md`. Considere as regras do projeto em `rules/mvc.md` e `rules/coding-standards.md`. Agora, crie um controller para a entidade Consultas..."

### 2. No GitHub Copilot (Custom Instructions)
Se usar VS Code ou IDE compatível, você pode referenciar o conteúdo desta pasta nas "Custom Instructions" do Copilot ou usar as menções rápidas (ex: `@workspace`) acompanhado de um texto:
> "Siga estritamente as regras definidas na pasta `/ai-context` ao propor refatoração deste Controller."

### 3. Em Agentes Autônomos (Cursor, Devika, AutoGPT)
Diga explicitamente ao Agente para ler o diretório `/ai-context/` e absorver as diretrizes antes de planejar a execução da tarefa.