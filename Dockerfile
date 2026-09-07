FROM php:8.4-fpm

# نصب وابستگی‌های سیستمی
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite mbstring exif pcntl bcmath gd

# نصب Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نصب Node.js 20
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# تنظیم working directory
WORKDIR /var/www/html

# کپی پروژه
COPY . .

# نصب پکیج‌های PHP
RUN composer install --no-interaction --no-dev --optimize-autoloader

# نصب پکیج‌های Node و build فرانت‌اند
RUN npm ci && npm run build

# ساخت فایل SQLite اگر وجود نداشت
RUN mkdir -p database && touch database/database.sqlite

# تنظیم permission ها
RUN chown -R www-data:www-data /var/www/html/storage \
    /var/www/html/bootstrap/cache \
    /var/www/html/database

# پورت
EXPOSE 10000

# اجرا
CMD sh -c "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"
