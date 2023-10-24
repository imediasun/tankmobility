FROM cyberduck/php-fpm-laravel:8.1

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
    zlib1g-dev \
    libicu-dev \
    librdkafka-dev \
    gettext \
    && pecl install imagick redis xdebug \
    && docker-php-ext-enable imagick redis xdebug \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure pgsql \
    && docker-php-ext-install exif \
    && docker-php-ext-install -j$(nproc) gd soap iconv pdo pdo_mysql pdo_pgsql pgsql zip mbstring exif intl \
    && docker-php-source delete \
RUN docker-php-ext-configure intl \
    && docker-php-ext-configure gettext \
    && docker-php-ext-install \
    intl \
    gettext

# Packages
RUN DEBIAN_FRONTEND=noninteractive apt-get install -y \
        python \
        && ( \
            cd /tmp \
            && mkdir librdkafka \
            && cd librdkafka \
            && git clone https://github.com/edenhill/librdkafka.git . \
            && ./configure \
            && make \
            && make install \
        ) \
    && rm -r /var/lib/apt/lists/*

RUN \
apt-get update && \
apt-get install libldap2-dev -y && \
rm -rf /var/lib/apt/lists/* && \
docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
docker-php-ext-install ldap

# PHP Extensions
RUN pecl install rdkafka \
    && docker-php-ext-enable rdkafka
COPY api-backend/storage /var/www/storage
WORKDIR /var/www/
RUN chown -R root:root storage
RUN chmod 755 storage
RUN chown -R root:root storage/kafka/secrets
RUN chmod 755 storage/kafka/secrets

#EXPOSE 8080
CMD ["php-fpm", "--nodaemonize"]
