FROM php:7.2-fpm

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash -

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libpq-dev \
    nano \
    nodejs \
    libpng-dev \
    vim \
    cron \
    && docker-php-ext-install pdo pdo_mysql mysqli zip mbstring exif gd

RUN apt-get update && apt-get install -y libmagickwand-dev imagemagick --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Copy existing application directory contents
# COPY . /var/www

# RUN chown -R www-data:www-data /var/www/site/storage
# RUN usermod -u 1000 www-data

# # Change current user to www-data
# USER www-data

# ENTRYPOINT /entrypoint.sh
