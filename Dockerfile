# Gunakan PHP 8.3 dengan FPM
FROM php:8.2-fpm

# Install dependency untuk Laravel dan GD
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project
COPY . .

# Install composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Laravel optimize
RUN php artisan config:clear && php artisan config:cache

RUN php artisan migrate --force
RUN php artisan storage:link

# Expose port for Railway
CMD php artisan serve --host=0.0.0.0 --port=${PORT}
