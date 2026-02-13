FROM php:8.2-apache

# Install dependencies for GD and Composer
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
