FROM php:fpm

RUN docker-php-ext-install pdo pdo_mysql

# some config I found on https://medium.com/weekly-webtips/debug-with-vscode-xdebug-and-docker-on-windows-147af5dd089b
# RUN pecl install -f xdebug
# RUN echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini;

COPY configurations/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
RUN pecl install xdebug && docker-php-ext-enable xdebug