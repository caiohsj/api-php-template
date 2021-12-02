FROM php:7.4-apache
RUN apt-get update -y && apt-get install -y \
    libcurl4-openssl-dev \
    openssl \
    libonig-dev \
    zip \
    unzip \
    git
RUN docker-php-ext-install curl pdo_mysql
RUN a2enmod rewrite