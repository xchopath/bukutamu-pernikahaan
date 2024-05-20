FROM php:7.4-apache
COPY app/ /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80