# Use official PHP image with required extensions
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd sockets

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# copy composer files
COPY composer.json composer.lock ./
# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Copy project files
COPY . .

#set storage permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
 && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

 # run npm run dev
 RUN npm run dev

# Expose port
EXPOSE 8000

 CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]


