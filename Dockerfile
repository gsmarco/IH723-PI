FROM php:8.2-apache

# Copia el código de tu proyecto a la carpeta web
COPY . /var/www/html/

# Habilita la extensión de PHP para MySQL
RUN docker-php-ext-install mysqli

# Puerto que Render usará
EXPOSE 80
