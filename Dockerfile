# Use official PHP + Apache
FROM php:8.2-apache

# Enable Apache rewrite
RUN a2enmod rewrite

# Install mysqli extension for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files
COPY . /var/www/html/

# Set working dir
WORKDIR /var/www/html

# Ensure permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
