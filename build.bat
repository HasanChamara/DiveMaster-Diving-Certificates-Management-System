@echo off

echo Installing dependencies
composer install

echo Copying .env file
copy .env.example .env

echo Generating app key
php artisan key:generate

echo Running migrations
php artisan migrate

echo Starting Laravel server on http://localhost:8000
php artisan serve
