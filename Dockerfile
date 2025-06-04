FROM php:8.1-apache

# Apache config
COPY default.conf /etc/apache2/sites-available/000-default.conf

# Project files
COPY ./public /var/www/html/
COPY ./php /var/www/html/php

RUN docker-php-ext-install pdo pdo_mysql mysqli
