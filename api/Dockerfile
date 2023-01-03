FROM tangramor/nginx-php8-fpm:php8.1.13_withoutNodejs as standalone
# copy source code
COPY . /var/www/html

# If there is a conf folder under /var/www/html, the start.sh will
# copy conf/nginx.conf to /etc/nginx/nginx.conf
# copy conf/nginx-site.conf to /etc/nginx/conf.d/default.conf
# copy conf/nginx-site-ssl.conf to /etc/nginx/conf.d/default-ssl.conf

# copy ssl cert files
#COPY conf/ssl /etc/nginx/ssl

# China alpine mirror: mirrors.ustc.edu.cn
ARG APKMIRROR=""

# start.sh will set desired timezone with $TZ
ENV TZ America/Mazatlan

# China php composer mirror: https://mirrors.cloud.tencent.com/composer/
ENV COMPOSERMIRROR=""
# China npm mirror: https://registry.npmmirror.com
ENV NPMMIRROR=""

# start.sh will replace default web root from /var/www/html to $WEBROOT
ENV WEBROOT /var/www/html/public

# start.sh will use redis as session store with docker container name $PHP_REDIS_SESSION_HOST
#ENV PHP_REDIS_SESSION_HOST redis

# start.sh will create laravel storage folder structure if $CREATE_LARAVEL_STORAGE = 1
#ENV CREATE_LARAVEL_STORAGE "1"

# download required node/php packages,
# some node modules need gcc/g++ to build

RUN apk add --no-cache --virtual .build-deps gcc g++ libc-dev make \
        # set preferred npm mirror
        && cd /usr/local \
        && apk del .build-deps
