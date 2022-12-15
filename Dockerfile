FROM php:7.4-apache
WORKDIR /
COPY . .

RUN apt-get update && apt-get install -y zip libzip-dev 

RUN docker-php-ext-install zip
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli

RUN docker-php-ext-install zip
#RUN a2enmod rewrite
RUN a2dismod proxy
RUN a2enmod proxy proxy_fcgi


