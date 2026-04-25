FROM php:8.3-cli

WORKDIR /app

# install dependency
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# copy project
COPY . .

# install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# install laravel dependency
RUN composer install --no-dev --optimize-autoloader

# generate key (optional kalau belum)
RUN php artisan key:generate || true

# expose port
EXPOSE 8000

# run server
CMD php artisan serve --host=0.0.0.0 --port=${PORT}