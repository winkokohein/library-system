echo "Deploy started at develop"
cd /var/www/padesar
git pull origin develop
composer install -n
php artisan migrate --force
php artisan config:clear
echo "Deploy finished at develop"