# 🤖 Instruções Automáticas para o GitHub Copilot (FibroCare)

Você é a IA de apoio ao desenvolvimento do sistema **FibroCare**. Para manter e desenvolver nossas features perfeitamente alinhadas com nosso código base, você **DEVE sempre** consultar e validar as regras globais e contextuais disponíveis em nosso diretório de contexto.

## Principais Padrões (NUNCA os viole):
1. **Arquitetura Base**: Utilizamos PHP Clássico, Apache, PostgreSQL e Docker de forma pura. NUNCA sugira a utilização de frameworks pesados (Laravel, Symfony, etc).
2. **Padrão MVC**: Os controllers devem ser leves e sem blocos explícitos de HTML ou `echo`. As visualizações (`Views`) utilizam o TailwindCSS importado e dependem de um empilhamento em `ob_start()`.
3. **Database Segura**: Todas as querys SQL processadas dentro de um arquivo `Model` obrigatoriamente utilizam o PDO usando **Prepared Statements** e `->execute([...])` para varrer riscos de injeção.
4. **Domínio Fibromialgia**: A avaliação de métricas (especialmente intensidade de dores e sintomas) flutuará estritamente através de inteiros entre **1 e 10**.

## Como aprofundar seu contexto?
Antes de propor scripts grandes, novos CRUDS ou mudanças visuais, releia os arquivos essenciais que detalham seus papéis na pasta `/ai-context`:
- Para modelagem de tabela: `/ai-context/skills/database-modeling.md`.
- Para regras sólidas de PSR/Validações de View: `/ai-context/rules/validation.md`.
- Para criar algo interativo: `/ai-context/skills/crud-generation.md`.