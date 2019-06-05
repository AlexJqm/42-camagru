FROM php:7.3-apache
RUN apt-get update && \
	apt-get -y install sudo
RUN docker-php-ext-install mysqli
