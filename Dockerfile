FROM php:8.2-apache

# PHP PDO and MySQL extension install karna
RUN docker-php-ext-install pdo pdo_mysql

# Aapke code ko container me copy karna
COPY ./php /var/www/html/php
COPY ./public /var/www/html/
COPY ./default.conf /etc/apache2/sites-enabled/000-default.conf


    