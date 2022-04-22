#
#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#
FROM phpdockerio/php74-fpm:latest
WORKDIR /application

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

WORKDIR /application

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install php7.4-mysql php7.4-gd php7.4-redis supervisor &&  \
    apt-get install -yq mc nano vim htop procps telnet iputils-ping

# Install git
RUN apt-get update \
    && apt-get -y install git

# Redis
RUN apt-get update \
	&& apt-get install -y redis-server

EXPOSE 6379

# Install cron
RUN apt-get update && apt-get install -y cron

COPY ./php.ini /usr/local/etc/php/conf.d/app.ini

USER root

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Adding the faketime library to the preload file needs to be done last
# otherwise it will preload it for all commands that follow in this file
RUN if [ ${INSTALL_FAKETIME} = true ]; then \
    echo "/usr/lib/x86_64-linux-gnu/faketime/libfaketime.so.1" > /etc/ld.so.preload \
;fi

# Clean
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /var/cache/*