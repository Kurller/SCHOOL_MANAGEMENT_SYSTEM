#!/bin/bash

echo "Starting School Management System..."

php artisan storage:link || true

php artisan optimize:clear

php artisan config:cache

php artisan route:cache

php artisan view:cache


php-fpm -D


nginx -g "daemon off;"