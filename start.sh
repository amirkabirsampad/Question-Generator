#!/bin/sh
set -e

mkdir -p database
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

touch database/database.sqlite
rm -f public/hot

# اول config را clear کن (به دیتابیس نیاز نداره)
php artisan config:clear

# بعد migrate کن (جداول ساخته میشن)
php artisan migrate --force

# حالا cache را clear کن (چون جدول cache الان وجود داره)
php artisan cache:clear

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
