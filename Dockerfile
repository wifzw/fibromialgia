FROM php:8.2-apache

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Instalar extensões necessárias para o PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Definir o DocumentRoot para a pasta public/
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/apache2.conf

# Dar permissões
RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html
