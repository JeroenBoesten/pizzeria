#####################
# Development Stage #
#####################
FROM php:8.3-fpm-alpine AS dev

WORKDIR /var/www

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the composer json and lock file
COPY composer.json composer.lock ./

# Install the composer dependencies
RUN composer install --no-scripts

# Copy the code into the container
COPY . .

# Copy the env file
RUN cp .env.example .env

# Set the appropriate permissions for Laravel directories
RUN chown -R www-data:www-data  /var/www \
    && find . -type f -exec chmod 644 {} \; \
    && find . -type d -exec chmod 755 {} \; \
    && chgrp -R www-data storage bootstrap/cache \
    && chmod -R ug+rwx storage bootstrap/cache
