FROM php:7.4-fpm

RUN set -xe; \
    apt-get update -yqq && \
    pecl channel-update pecl.php.net && \
    apt-get install -yqq \
      apt-utils \
      libzip-dev zip unzip && \
      docker-php-ext-configure zip; \
      docker-php-ext-install zip && \
            php -m | grep -q 'zip' \
      docker-php-ext-install pdo pgsql pdo_pgsql \

RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet

COPY ./laravel.ini /usr/local/etc/php/conf.d

USER root

# Clean up
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

# Configure locale.
ARG LOCALE=POSIX
ENV LC_ALL ${LOCALE}

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000
