FROM php:8.2-fpm


WORKDIR /var/www


RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev


RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg


RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip


COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


COPY . .


RUN composer install \
    --optimize-autoloader


RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash -

RUN apt-get install -y nodejs


RUN npm install

RUN npm run build


COPY nginx.conf /etc/nginx/sites-available/default


COPY start.sh /start.sh

RUN chmod +x /start.sh


RUN chown -R www-data:www-data \
    storage \
    bootstrap/cache


EXPOSE 80


CMD ["/start.sh"]