FROM php:8.0-apache

WORKDIR /var/www/html
RUN apt-get update -y && apt-get upgrade -y && apt-get install vim net-tools git libssl-dev -y
RUN pecl install mongodb && docker-php-ext-enable mongodb
# RUN docker-php-ext-install mongodb
COPY ./php.ini /usr/local/etc/php/php.ini
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini
# Install Composer
RUN cd ~ \
    && curl -sS https://getcomposer.org/installer -o composer-setup.php \
    && HASH=`curl -sS https://composer.github.io/installer.sig` \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer require mongodb/mongodb \
    && composer require ramsey/uuid

EXPOSE 80 443