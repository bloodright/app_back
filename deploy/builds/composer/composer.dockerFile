FROM composer

WORKDIR /var/www

# RUN docker-php-ext-install pdo_pgsql pcntl

CMD composer install --ignore-platform-reqs
# && php artisan migrate
