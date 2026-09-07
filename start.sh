#!/bin/sh

set -e

mkdir -p database
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

touch database/database.sqlite
rm -f public/hot

php artisan migrate --force

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8080}"
