#!/bin/sh

# اجرای migrate
php artisan migrate --force

# اجرای npm run dev در background
npm run dev &

# اجرای Laravel (foreground - باید آخر باشه)
php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
