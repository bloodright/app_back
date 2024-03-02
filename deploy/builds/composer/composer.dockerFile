FROM composer

WORKDIR /var/www

CMD composer install && php artisan migrate
