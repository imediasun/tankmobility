FROM php:8.1-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    ca-certificates \
    curl \
    git \
    zip \
    unzip \
    zlib1g-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libpq-dev \
    libmagickwand-dev \
    ghostscript \
    && pecl install imagick redis xdebug \
    && docker-php-ext-enable imagick redis xdebug \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure pgsql \
    && docker-php-ext-install exif \
    && docker-php-ext-install -j$(nproc) gd soap iconv pdo pdo_mysql pdo_pgsql pgsql zip mbstring exif intl\
    && docker-php-source delete

RUN pecl install mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./docker/etc/php/entrypoint.sh /bin/entrypoint.sh
COPY ./docker/etc/nginx/cert/wonderkind.test/cacert.pem /bin/cacert.pem
RUN chmod +x /bin/entrypoint.sh
RUN chmod +x /bin/cacert.pem
RUN chown -R www-data: /var/www
RUN chmod -R 777 /var/www
RUN chmod 777 /tmp

EXPOSE 9000

CMD ["php-fpm", "--nodaemonize"]
#CMD ["php", "-S", "0.0.0.0:9000", "-t", "/var/www/public"]
