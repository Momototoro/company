FROM php:8.3-apache
LABEL authors="M.Müller"

RUN docker-php-ext-install pdo pdo_mysql
COPY company.conf /etc/apache2/sites-available
COPY pokedock.conf /etc/apache2/sites-available

RUN a2ensite company.conf
RUN a2ensite pokedock.conf
RUN a2dissite 000-default.conf
RUN a2enmod rewrite

#COPY public/pokemon.html /var/www/html/
#COPY public/phpinfo.php /var/www/html/
