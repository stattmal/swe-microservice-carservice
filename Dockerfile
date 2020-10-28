FROM php:7.4-fpm-alpine

# Install system updates
RUN apk update \
    && apk add wget zip git \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo_mysql

# Install dependencies
COPY src/composer.lock src/composer.json /var/www/html/
RUN wget -nv https://getcomposer.org/download/1.10.1/composer.phar \
    && php composer.phar install --no-scripts --no-autoloader --no-interaction --no-ansi

# Copy application
COPY src/ .

RUN chown -R www-data:www-data \
    ./storage \
    ./bootstrap/cache \
    && php composer.phar dump-autoload -o \
    && php artisan storage:link \
    && chown -R www-data:www-data ./public/storage

# Start the application
CMD php artisan migrate \
    && php artisan optimize \
    && 'php-fpm'
