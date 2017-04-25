FROM php:7.0.2-apache
COPY php.ini /usr/local/etc/php/
RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng12-dev libmcrypt-dev zlib1g-dev libicu-dev g++ zip unzip \
  && docker-php-ext-configure intl \
  && docker-php-ext-install intl pdo_mysql mysqli mbstring gd iconv mcrypt

# apache config
## Custom VirturlHost
ENV COSTOM_ENABLED=custom-enabled
RUN mkdir -p  /etc/apache2/${COSTOM_ENABLED}
RUN echo "" >> /etc/apache2/apache2.conf \
  && echo "# Include the configurations from the host machine" >> /etc/apache2/apache2.conf \
  && echo "IncludeOptional ${COSTOM_ENABLED}/*.conf" >> /etc/apache2/apache2.conf \
  && ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/

# Install git
RUN apt-get install -y libcurl4-gnutls-dev libexpat1-dev gettext libz-dev libssl-dev
RUN apt-get install -y git
