FROM php:8-fpm

ARG user
ARG uid

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install sockets

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install soap

RUN apt-get update && apt-get install -y libaio1

ADD ./.docker/php/php.ini /usr/local/etc/php/php.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

ENV COMPOSER_ALLOW_SUPERUSER=1

USER $user

WORKDIR /var/www

COPY composer.json ./

USER root

RUN chown -R  $user:$user /var/www/

RUN composer install --ignore-platform-reqs --no-interaction --no-plugins --no-scripts

COPY . ./

WORKDIR /var/www/


# RUN su -c "composer install --ignore-platform-reqs --no-interaction --no-plugins --no-scripts" $user


