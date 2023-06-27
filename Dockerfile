FROM php:8.2-apache
# For extensions:
# https://gist.github.com/hoandang/88bfb1e30805df6d1539640fc1719d12
RUN docker-php-ext-install pdo pdo_mysql mysqli