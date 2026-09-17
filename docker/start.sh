#!/bin/sh

set -e

echo "Starting GeekJobs Laravel application..."

echo "Preparing upload directories..."

mkdir -p /var/www/html/public/gallery
mkdir -p /var/www/html/public/uploads
mkdir -p /var/www/html/public/features
mkdir -p /var/www/html/public/cvs

chown -R www-data:www-data /var/www/html/public/gallery
chown -R www-data:www-data /var/www/html/public/uploads
chown -R www-data:www-data /var/www/html/public/features
chown -R www-data:www-data /var/www/html/public/cvs

chmod -R 775 /var/www/html/public/gallery
chmod -R 775 /var/www/html/public/uploads
chmod -R 775 /var/www/html/public/features
chmod -R 775 /var/www/html/public/cvs



PORT=${PORT:-10000}

echo "Using port: $PORT"

echo "Checking Aiven SSL certificate..."

if [ -f "$MYSQL_ATTR_SSL_CA" ]; then
    echo "Aiven CA certificate found at: $MYSQL_ATTR_SSL_CA"

    cp "$MYSQL_ATTR_SSL_CA" /tmp/aiven-ca.pem
    chmod 644 /tmp/aiven-ca.pem

    export MYSQL_ATTR_SSL_CA=/tmp/aiven-ca.pem

    echo "Using readable Aiven CA certificate: $MYSQL_ATTR_SSL_CA"
else
    echo "ERROR: Aiven CA certificate NOT found at: $MYSQL_ATTR_SSL_CA"
    exit 1
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


echo "Testing Nginx configuration..."

nginx -t

echo "Starting Nginx on port $PORT..."

nginx -g "daemon off;"