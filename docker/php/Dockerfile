FROM php:7.4-fpm

RUN ln -sf /usr/share/zoneinfo/Europe/Moscow /etc/localtime

RUN apt-get update \
&& apt-get install -y git \
                      cron \
                      zlib1g-dev \
                      libfreetype6-dev \
                      libzip-dev \
                      libpng-dev \
                      libpq-dev \
&& docker-php-ext-install pdo pgsql pdo_pgsql zip bcmath gd \
&& curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www

RUN usermod -u 1000 www-data

RUN chown -R www-data:www-data .

EXPOSE 9000
