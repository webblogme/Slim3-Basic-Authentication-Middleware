FROM php:5.6-apache

#RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
#php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
#php composer-setup.php && \
#php -r "unlink('composer-setup.php');" && \
#mv composer.phar /usr/local/bin/composer
#
#COPY ./composer.json /var/www/html/
#
#RUN apt-get update && \
#apt-get install -y git
#
#RUN composer install

##COPY FILE OFF THE CONTAINER
##RUN cp -a /var/www/html/vendor d:\\htdocker\\slim3-starterpack
##$docker cp slim_php_1:/var/www/html/vendor d:\\htdocker\\slim3-starterpack

#LOAD MOD REWRITE
RUN a2enmod rewrite

# Apache conf
# to see live logs we do : docker logs -f [CONTAINER ID]
# without the following line we get "AH00558: apache2: Could not reliably determine the server's fully qualified domain name"
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
# autorise .htaccess files
RUN sed -i '/<Directory \/var\/www\/html\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "session.gc_maxlifetime = 360000; " >> /usr/local/etc/php/conf.d/uploads.ini

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "date.timezone = 'Asia/Bangkok';" >> /usr/local/etc/php/conf.d/uploads.ini

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "memory_limit = '500M';" >> /usr/local/etc/php/conf.d/uploads.ini

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
	&& echo "upload_max_filesize = '30M';" >> /usr/local/etc/php/conf.d/uploads.ini

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
	&& echo "post_max_size = '30M';" >> /usr/local/etc/php/conf.d/uploads.ini

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 600;" >> /usr/local/etc/php/conf.d/uploads.ini

#LOAD PDO FOR MEDOO
RUN docker-php-ext-install pdo pdo_mysql

#LOAD MYSQLI FOR WORDPRESS
#RUN docker-php-ext-install mysql mysqli pdo pdo_mysql
#
##LOAD PHP GD + mCrypt
#RUN apt-get update && \
#apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libmcrypt-dev libpng-dev && \
#docker-php-ext-install -j$(nproc) iconv mcrypt && \
#docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  &&  \
#docker-php-ext-install gd -j$(nproc) gd
#
