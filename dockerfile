# Usar imagen oficial de PHP 8.2 con Apache
FROM php:8.2-apache

# Instalar extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    mariadb-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Copiar archivos del proyecto
WORKDIR /var/www/html/crud-products
COPY . .

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html/crud-products \
    && chmod -R 775 /var/www/html/crud-products/storage /var/www/html/crud-products/bootstrap/cache

# Exponer puerto 80
EXPOSE 8000

# Comando de inicio
CMD ["apache2-foreground"]

