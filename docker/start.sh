#!/bin/sh

set -e

echo "Starting GeekJobs Laravel application..."

# Render provides the PORT environment variable.
PORT=${PORT:-10000}

echo "Using port: $PORT"

# Replace __PORT__ in nginx configuration
sed -i "s/__PORT__/$PORT/g" /etc/nginx/conf.d/default.conf

echo "Testing database connection..."

php artisan db:show || true

echo "Creating storage link..."

php artisan storage:link || true

echo "Clearing Laravel caches..."

php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx on port $PORT..."

nginx -g "daemon off;"