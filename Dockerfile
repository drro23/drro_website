FROM php:7.4.4-fpm

WORKDIR /var/www

COPY composer.json .

COPY composer.lock .

COPY package.json .

RUN apt-get update && apt-get install -y \
        build-essential \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        locales \
        zip \
        jpegoptim optipng pngquant gifsicle \
        unzip \
        curl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel and all dependencies
RUN composer install

# NPM for frontend builds
RUN apt install nodejs npm -y

RUN npm install

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

COPY . .