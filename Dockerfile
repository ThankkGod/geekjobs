# =========================================================
# Stage 1: Build frontend assets
# =========================================================
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY resources ./resources
COPY vite.config.js ./
COPY public ./public

RUN npm run build


# =========================================================
# Stage 2: Laravel + PHP-FPM + Nginx
# =========================================================
FROM php:8.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
   && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    opcache \
    intl


# =========================================================
# Install Composer
# =========================================================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


# =========================================================
# Laravel application
# =========================================================
WORKDIR /var/www/html

COPY . .


# =========================================================
# Install Laravel PHP dependencies
# =========================================================
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist


# =========================================================
# Copy Vite production assets
# =========================================================
COPY --from=frontend /app/public/build ./public/build


# =========================================================
# Laravel permissions
# =========================================================
RUN chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache \
    && chmod -R 775 \
        /var/www/html/storage \
        /var/www/html/bootstrap/cache

# =========================================================
# Nginx configuration
# =========================================================

# Remove Nginx's default site
RUN rm -f /etc/nginx/sites-enabled/default \
          /etc/nginx/sites-available/default

COPY docker/nginx.conf /etc/nginx/conf.d/default.conf


# =========================================================
# Startup script
# =========================================================
COPY docker/start.sh /start.sh

RUN chmod +x /start.sh

# =========================================================
# Render web service port
# =========================================================
EXPOSE 80

# =========================================================
# Start Laravel
# =========================================================
CMD ["/start.sh"]