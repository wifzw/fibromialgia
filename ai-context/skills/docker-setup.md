# Habilidade: Setup e Manutenção Docker (docker-setup.md)

**Descrição da Skill:**
Competência para auditar, manter ou escalar orquestrações de contêineres e imagens Dockerfiles personalizadas.

**O que a IA deve saber fazer:**
- Injetar Extensões PECL nativas do PHP via linha de comando no `Dockerfile` (ex: `docker-php-ext-install pdo pdo_pgsql`).
- Redefinir e gerir permissões seguras em diretórios de volume (`chown www-data:www-data`).
- Orquestrar a persistência do banco de dados na máquina do host mapeada pelo `docker-compose`.

**Passo a Passo (Workflow em manutenções):**
1. Se necessário uma biblioteca nova do SO (ex: cURL, libzip, GD), editar o `RUN apt-get update && apt-get install...`.
2. Habilitar extensões web caso necessário e o mod_rewrite de forma forçada.
3. Compreender a injenção do ambiente (Environment Variables) no arquivo `.yml` e repassados para a rede interna.