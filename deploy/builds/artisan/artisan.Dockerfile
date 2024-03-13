FROM php:8.3-fpm-alpine

WORKDIR /var/www

# COPY ../../../mlteam/ .

RUN apk add --no-cache postgresql-dev

RUN docker-php-ext-install pdo_pgsql

# CMD php artisan migrate