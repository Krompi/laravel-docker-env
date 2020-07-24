FROM php:7.4-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid
# Proxy
ARG proxy=""
ENV http_proxy=http://10.167.16.21:80
ENV https_proxy=http://10.167.16.21:80
ENV no_proxy="localhost, *.bvv.bayern.de, *.blva.bayern.de, *.lvg.bayern.de, *.bybn"

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user