#!/bin/sh

# Tunggu database siap
echo "Waiting for database..."
sleep 5

# Run migrations
php artisan migrate --force

# Create storage link (kalau belum)
php artisan storage:link || true

# Cache config
php artisan config:cache

# Jalankan Laravel
php artisan serve --host=0.0.0.0 --port=${PORT}
