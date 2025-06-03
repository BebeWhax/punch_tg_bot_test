FROM php:8.2-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git curl zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Установка composer
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

WORKDIR /var/www

# Копирование проекта
COPY . .
COPY .env.example .env

# Создание необходимых директорий и прав
RUN mkdir -p storage/framework storage/logs bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Установка зависимостей
RUN composer install --no-interaction --no-scripts

EXPOSE 9000
CMD ["php-fpm"]