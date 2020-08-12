FROM php:7.2-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    libpq-dev \
    nano \
    libpng-dev \
    vim \
    cron \
    && docker-php-ext-install pdo pdo_mysql mysqli zip mbstring exif gd

RUN apt-get update && apt-get install -y libmagickwand-dev libfreetype6-dev libjpeg62-turbo-dev imagemagick --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd 

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Copy existing application directory contents
# COPY . /var/www

# RUN chown -R www-data:www-data /var/www
# RUN usermod -u 1000 www-data

# # Change current user to www-data
# USER www-data

# ENTRYPOINT /entrypoint.sh
