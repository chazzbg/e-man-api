FROM php:7-fpm
RUN docker-php-ext-install mbstring pdo pdo_mysql
