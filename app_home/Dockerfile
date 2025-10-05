# Usamos la imagen PHP-FPM (el intérprete)
FROM php:8.1-fpm-alpine

# Instalar extensiones de MySQL (esenciales para la conexión mysqli)
RUN docker-php-ext-install pdo_mysql mysqli

# Definimos el directorio de trabajo y copiamos el código
WORKDIR /var/www/html
COPY . /var/www/html