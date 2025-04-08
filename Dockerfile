# Use official PHP image with required extensions
FROM php:8.2-apache

# Enable Apache mod_rewrite for Laravel routes
RUN a2enmod rewrite

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd sockets

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# copy composer files
COPY composer.json composer.lock ./
# Install Composer dependencies
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Copy project files
COPY . .

#set storage permissions
RUN chown -R www-data:www-data /var/www \
  && chmod -R 755 /var/www/storage \
  && chmod -R 755 /var/www/bootstrap/cache

  # Update Apache to serve from Laravel's public folder
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf


# Expose port
EXPOSE 80

#CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

