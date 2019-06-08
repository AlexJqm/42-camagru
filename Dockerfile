FROM php:7.3-apache
RUN apt-get update && \
	apt-get -y install sudo
RUN docker-php-ext-install pdo pdo_mysql
USER root
RUN cd /var/www && mkdir uploads
