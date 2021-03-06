FROM php:7.3-apache

RUN apt-get update && \
	apt-get install -y -q --no-install-recommends ssmtp

# php config
RUN docker-php-ext-install pdo pdo_mysql
USER root
RUN cd /var/www && mkdir uploads
RUN touch /usr/local/etc/php/conf.d/uploads.ini && \
	echo "upload_max_filesize = 100M;" >> /usr/local/etc/php/conf.d/uploads.ini

# sendmail config

RUN a2enmod rewrite
