#!/bin/sh

set -e

echo "Starting GeekJobs Laravel application..."

PORT=${PORT:-10000}

echo "Using port: $PORT"

echo "Checking Aiven SSL certificate..."

if [ -f "$MYSQL_ATTR_SSL_CA" ]; then
    echo "Aiven CA certificate found at: $MYSQL_ATTR_SSL_CA"
else
    echo "ERROR: Aiven CA certificate NOT found at: $MYSQL_ATTR_SSL_CA"
fi

# Replace __PORT__ with Render's actual port
sed -i "s/__PORT__/$PORT/g" /etc/nginx/conf.d/default.conf

echo "Testing database connection..."

php artisan db:show

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