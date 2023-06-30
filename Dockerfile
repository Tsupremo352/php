FROM php:8.2-apache
# For extensions:
# https://gist.github.com/hoandang/88bfb1e30805df6d1539640fc1719d12
RUN apt-get -o Acquire::Max-FutureTime=86400 update && apt-get install -y libpq-dev git \
    && docker-php-ext-install pdo_pgsql
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer
COPY ./www/composer.* ./
RUN composer install --no-interaction
RUN composer dump-autoload --optimize