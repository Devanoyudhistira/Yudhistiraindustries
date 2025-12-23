php artisan migrate --force
php artisan key:generate --force
php artisan storage:link || true
php artisan serve --host=0.0.0.0 --port=$PORT