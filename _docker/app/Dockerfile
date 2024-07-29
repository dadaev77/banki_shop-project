FROM php:8.1-fpm


RUN apt-get update; \
    apt-get install -y --no-install-recommends \
            curl \
            libzip-dev \
            libxslt-dev \
            zip \
            vim \
            nano \
            unzip \
            mc

RUN docker-php-ext-install \
        pdo_mysql \
        zip \
        xsl \
        bcmath \
        opcache \
        sockets \
        mysqli

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/bin --filename=composer &&\
    php -r "unlink('composer-setup.php');"



COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

ADD ./ /var/www/

WORKDIR /var/www/

RUN useradd --user-group --system --create-home --no-log-init www
RUN usermod -u 1000 www-data

RUN chown -R www-data:www-data storage
RUN chmod -R 777 storage/
RUN chown -R www-data:www-data bootstrap/cache

CMD ["php-fpm"]

EXPOSE 9000