FROM php:8.2-fpm

# Install system packages + Node.js
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    nginx \
    libzip-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    gnupg

# Install Node.js 22
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# PHP Extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_mysql \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies and build Vite assets
RUN npm install
RUN npm run build

RUN php artisan config:clear

RUN chown -R www-data:www-data /var/www

COPY nginx.conf /etc/nginx/sites-available/default

EXPOSE 10000

CMD php artisan migrate --force && \
    php artisan storage:link || true && \
    php artisan optimize:clear && \
    php artisan config:cache && \
    php-fpm -D && \
    nginx -g "daemon off;"