FROM php:8.1-fpm-alpine

RUN apk add --no-cache nginx wget

RUN docker-php-ext-install pdo pdo_mysql

RUN apk add --no-cache \
        libjpeg-turbo-dev \
        libpng-dev \
        libwebp-dev \
        freetype-dev \
        libjpeg-turbo-dev \
        libpng-dev 
RUN docker-php-ext-install gd

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

ARG BMPQAPASS
ARG BMPQAHOST
ARG BMPQAUSERNAME
ARG BMPQABD
ENV PASS ${BMPQAPASS}
ENV HOST ${BMPQAHOST}
ENV USERNAME ${BMPQAUSERNAME}
ENV BD ${BMPQABD}


RUN mkdir -p /app
COPY ./src /app
COPY ./docker/startup.sh /app

# ENV COMPOSER_ALLOW_SUPERUSER 1

# RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/local/bin/composer"
# COPY --from=composer /usr/bin/composer /usr/bin/composer
# RUN composer self-update

# RUN composer update && composer install

RUN chmod -R 777 /app/storage
RUN chmod -R 777 /app/vendor
RUN chmod -R 777 /app/bootstrap
# RUN chmod -R 777 /app
# RUN chown -R www-data: /app

CMD sh /app/startup.sh