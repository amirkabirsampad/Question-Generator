FROM php:8.3-fpm

# نصب وابستگی‌های سیستمی و اکستنشن‌های PHP
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# نصب Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نصب Node.js (برای build فرانت‌اند)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# کپی کردن کدها و نصب وابستگی‌ها
WORKDIR /var/www/html
COPY . .
RUN composer install --no-interaction --no-dev --optimize-autoloader
RUN npm ci --production && npm run build

# تنظیم دسترسی‌ها
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# پورت را باز می‌گذاریم (Render پورت را به ما می‌دهد)
EXPOSE 10000

# اجرای سرور با دریافت پورت از Render
CMD sh -c "php artisan serve --host=0.0.0.0 --port=$PORT"
