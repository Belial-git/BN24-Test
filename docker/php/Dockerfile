FROM php:8.3.4

RUN apt-get update && apt-get install -y \
        sudo \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libxml2-dev \
        zlib1g-dev \
        git \
        libonig-dev \
        libzip-dev \
        mc \
        nano \
        libpq-dev \
        redis

RUN apt-get update

RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install mbstring gd iconv zip soap intl sockets pdo pdo_pgsql pgsql pdo_mysql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN usermod -u 1000 www-data
RUN groupmod -g 1000 www-data
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD ["php", "artisan", "serve", "--host", "0.0.0.0"]
