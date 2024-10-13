# Use the official PHP image with Apache
FROM php:8.0-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the current directory contents into the container
COPY . .

# Install required PHP extensions
RUN docker-php-ext-install mysqli

# Expose port 80
EXPOSE 80
