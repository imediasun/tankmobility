#!/bin/sh
echo ' START PHP POST INSTALL SCRIPTS'

setfacl -dm u:www-data:rwX /var/www


cd /var/www

composer install
php artisan config:clear -v
php artisan cache:clear -v
#php artisan migrate
php artisan optimize:clear

mkdir -p /var/www/bootstrap/cache
chmod -R 777 storage
chmod -R 777  bootstrap

echo ' END PHP POST INSTALL SCRIPTS'

docker-php-entrypoint $@