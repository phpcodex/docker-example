# Download PHP
FROM php:7.2.7-fpm-alpine3.7

# Update our image
RUN apk update; \
    apk upgrade;

# Install PHP MySQLi driver
RUN docker-php-ext-install mysqli


ENV APP_ENV=testing