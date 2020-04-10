#
# PHP Dependencies
#
FROM composer:1.9 as vendor

# Could not scan for classes inside "database/seeds" which does not appear to be a file nor a folder
COPY database/ database/
COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader --no-scripts

#
# Application
#
FROM php:7.4-apache-buster

LABEL vendor="CallePuzzle ORG"
LABEL version="0.1"

# install packages
RUN apt-get update && \
    apt-get install -y \
    curl \
    libicu-dev \
    zlib1g-dev \
    locales \
    locales-all \
    && apt-get clean

ENV LANG es_ES.UTF-8
ENV LANGUAGE es_ES.UTF-8
ENV LC_ALL es_ES.UTF-8

# php extensions (https://laravel.com/docs/5.8/installation)
RUN docker-php-source extract && \
    docker-php-ext-install bcmath && \
    docker-php-ext-install intl && \
    docker-php-ext-install opcache && \
    docker-php-source delete

WORKDIR /var/www/html

RUN a2enmod rewrite
COPY docker/apache.conf /etc/apache2/sites-enabled/000-default.conf

# Copy app files
COPY . /var/www/html/
COPY --from=vendor /app/vendor/ /var/www/html/vendor/

RUN chown -R www-data:www-data /var/www/html

# Use the PORT environment variable in Apache configuration files.
# https://cloud.google.com/run/docs/reference/container-contract#port
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf
EXPOSE 8080

RUN mkdir -p /var/www/html/bootstrap/cache/

ENTRYPOINT ["/bin/bash", "-c"]
# Run
CMD ["php artisan warm-up && apache2-foreground"]
