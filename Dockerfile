FROM php:8.2-apache
# For extensions:
# https://gist.github.com/hoandang/88bfb1e30805df6d1539640fc1719d12
RUN apt-get -o Acquire::Max-FutureTime=86400 update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql