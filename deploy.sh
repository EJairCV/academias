#!/bin/bash

set -e

echo "Instalando dependencias de PHP con Composer..."
composer install

echo "Instalando dependencias de Node.js con Yarn..."
yarn install

echo "Compilando los activos con Laravel Mix..."
yarn prod

echo "Optimizando Laravel..."
php artisan optimize

echo "Caché de configuración de Laravel..."
php artisan config:cache

echo "Caché de rutas de Laravel..."
php artisan route:cache

echo "Caché de vistas de Laravel..."
php artisan view:cache

echo "Ejecutando migraciones..."
php artisan migrate --force

echo "Despliegue completado con éxito."