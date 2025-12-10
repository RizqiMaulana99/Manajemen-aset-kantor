#!/bin/sh

echo "Waiting database..."
sleep 5

php artisan migrate --force || true
php artisan storage:link || true
php artisan config:cache

php artisan serve --host=0.0.0.0 --port=${PORT}
