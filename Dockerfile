FROM php:8.4-fpm AS php-base

RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libsqlite3-dev sqlite3 \
    && docker-php-ext-install pdo_sqlite mbstring exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

FROM php-base AS builder

RUN apt-get update && apt-get install -y git curl zip unzip ca-certificates \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN composer install --no-interaction --no-dev --prefer-dist --optimize-autoloader
RUN npm ci && npm run build && rm -rf node_modules && rm -f public/hot

FROM php-base AS runtime

WORKDIR /var/www/html

COPY --from=builder --chown=www-data:www-data /var/www/html /var/www/html
COPY start.sh /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh \
    && chown -R www-data:www-data database storage bootstrap/cache

EXPOSE 8080

CMD ["/usr/local/bin/start.sh"]
