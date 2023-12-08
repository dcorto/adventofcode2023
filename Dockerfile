FROM php:8.3-cli-bullseye

RUN apt-get update && apt-get install -y \
        libzip-dev zip unzip \
    && docker-php-ext-install zip \
    && apt-get clean autoclean

RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer

WORKDIR /src

CMD ["sleep", "infinity"]