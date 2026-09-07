FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libsqlite3-dev sqlite3 \
    curl zip unzip git ca-certificates \
    && docker-php-ext-install pdo_sqlite mbstring exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*

# نصب Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

# نصب Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# نصب پکیج‌های PHP
RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader

# Build فرانت‌اند
RUN npm ci && npm run build

# چک کن build شده
RUN ls -la public/build/ && cat public/build/manifest.json

# حذف node_modules
RUN rm -rf node_modules && rm -f public/hot

# تنظیم permission
RUN chown -R www-data:www-data storage bootstrap/cache

COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 8080

CMD ["/usr/local/bin/start.sh"]
