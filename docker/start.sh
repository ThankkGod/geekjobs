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

echo "Testing Laravel PDO SSL connection..."

php -r '
try {
    $pdo = new PDO(
        "mysql:host=" . getenv("DB_HOST") . ";port=" . getenv("DB_PORT") . ";dbname=" . getenv("DB_DATABASE"),
        getenv("DB_USERNAME"),
        getenv("DB_PASSWORD"),
        [
            PDO::MYSQL_ATTR_SSL_CA => getenv("MYSQL_ATTR_SSL_CA"),
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]
    );

    echo "Laravel PDO SSL connection: SUCCESS\n";
} catch (Throwable $e) {
    echo "Laravel PDO SSL connection: FAILED\n";
    echo $e->getMessage() . "\n";
    exit(1);
}
'

echo "Starting PHP-FPM..."

php-fpm -D

echo "Starting Nginx on port $PORT..."

tail -F /var/www/html/storage/logs/laravel.log &
nginx -g "daemon off;"