FROM php:8.0-apache
WORKDIR /var/www/html
COPY . /var/www/html/
EXPOSE 80 27017
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/docker-php-ext-sodium.ini
RUN a2enmod rewrite 
RUN a2dissite 000-default 
RUN service apache2 restart
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN apt-get update && apt-get install git -y && apt-get install sudo -y
RUN  pecl install mongodb
RUN sudo composer require mongodb/mongodb --ignore-platform-reqs


# FROM php:8.0-apache
# RUN apt-get update \
#     && apt-get install -y --no-install-recommends openssl libssl-dev libcurl4-openssl-dev \
#     && pecl install mongodb \
#     && cp /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini \
#     && echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini \
#     && apt-get clean \
#     && rm -rf /var/lib/apt/lists/*
# WORKDIR /app
# COPY . /var/www/html
# EXPOSE 80 27017



