FROM php:7.4-apache
USER root
WORKDIR /var/www/html

RUN apt update --allow-releaseinfo-change \
    && curl -sL https://deb.nodesource.com/setup_14.x | bash - \
    && apt install -y \
        nodejs \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete

# Copy vhost.conf
COPY docker/config/apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Copy .env
# COPY .env /var/www/html/.env

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite