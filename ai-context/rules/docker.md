# Regras de Contêineres (docker.md)

**Descrição:** 
A aplicação orbita ambientes padronizados de desenvolvimento baseados em virtualização com Docker e `docker-compose`. Todo código novo gerado precisa estar ciente que rodamos em containers.

**A Stack Padrão:**
- Serviço `app`: Contêiner com imagem `php:8.2-apache`. O _DocumentRoot_ é alterado para a pasta `public/`.
- Serviço `db`: Contêiner oficial do _PostgreSQL_ (`postgres:15-alpine`). O banco expõe a porta nativa 5432 internamente.
- Comunicação: O PHP conecta-se pelo "hostname" interno `db` e não `localhost`.

**Comandos Obrigatórios aos agentes que configurarem Docker:**
- Configurações persistentes de volume de banco de dados (`pgdata:/var/lib/postgresql/data`).
- As variáveis de ambiente do DB DEVEM bater com os dados configurados no serviço Postgres (`POSTGRES_USER=fibadmin`, etc).

**Anti-patterns:**
- Presumir o uso do Composer instalado diretamente na máquina host ou XAMPP/WAMP.
- Expor DB na rede local em portas genéricas que causem colisão. 
- Esquecer de instalar extensões essenciais para o banco no Dockerfile do PHP (`pdo_pgsql`).