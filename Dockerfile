# Dockerfile
FROM php:8.3.12

ARG APP_HOME=/app
WORKDIR ${APP_HOME}

# Install semua dependency php
RUN apt-get update && apt-get install -y \
        curl \
        zip \
        unzip \
        git \
        libzip-dev \
        libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install zip pdo_pgsql pgsql fileinfo \
    && docker-php-ext-enable pdo_pgsql pgsql fileinfo

# Install Composer
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-autoloader --no-scripts

# Copy semua code
COPY . ${APP_HOME}

# Generate semua composer
RUN composer dump-autoload --optimize

# Handle Ini Jika File Bermasalah
RUN mkdir -p /app/syarata_dan_ketentuan && chmod -R 775 /app/syarata_dan_ketentuan

ENV PATH="/app/.env/bin:$PATH"

EXPOSE 8000