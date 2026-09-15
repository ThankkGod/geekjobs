#!/bin/sh

set -e

echo "Starting Laravel application..."

# Fix permissions
chown -R www-data:www-data /var/www/html/storage
chown -R www-data:www-data /var/www/html/bootstrap/cache

chmod -R 775 /var/www/html/storage
chmod -R 775 /var/www/html/bootstrap/cache

# Clear configuration cache
php artisan config:clear

# Create storage symlink
php artisan storage:link || true

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx..."

nginx -g "daemon off;"