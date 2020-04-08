#!/usr/bin/env bash

composer install
php artisan migrate
npm install --global cross-env
npm install
npm run production
chown -R www-data:www-data /var/www/storage
docker-php-entrypoint php-fpm
tail -f /dev/null