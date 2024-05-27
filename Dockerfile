# Usa una imagen base de PHP con Composer y Node.js
FROM php:8.1-fpm

# Instala dependencias del sistema y PHP
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala Node.js y Yarn
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs && \
    npm install --global yarn

# Copia los archivos del proyecto
COPY . /var/www

# Establece el directorio de trabajo
WORKDIR /var/www

# Copia el script de despliegue
COPY deploy.sh /var/www/deploy.sh

# Dar permisos de ejecución al script
RUN chmod +x /var/www/deploy.sh

# Ejecutar el script de despliegue
RUN ./deploy.sh

# Exponer el puerto 9000 y ejecutar PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]