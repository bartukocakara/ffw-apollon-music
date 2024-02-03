cd /var/www/ffw-apollon-music
git pull origin master
composer install --no-dev --optimize-autoloader
php artisan config:cache
php artisan route:cache
php artisan view:cache
