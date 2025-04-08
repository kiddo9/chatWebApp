# Use official PHP image with required extensions
FROM php:8.2-fpm

# Install system dependencies (Step 1)
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev

# Install Node.js (Step 2)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Install PHP extensions (Step 3)
RUN docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd sockets


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# COPY packages.json packages.lock ./
# Install Node.js dependencies
RUN npm install 

# copy composer files
COPY composer.json composer.lock ./
# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Copy project files
COPY . .

RUN npm run build

#set storage permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
 && chmod -R 775 /var/www/storage /var/www/bootstrap/cache


# Expose port
EXPOSE 8000

 CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]


