FROM php:8.1.7-fpm-alpine3.16
LABEL MAINTAINER="hoopan108@gmail.com"
ENV TZ "Asia/Shanghai"

# 时区
RUN echo ${TZ} >/etc/timezone

# 配置阿里云镜像源，加快构建速度。
RUN sed -i "s/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g" /etc/apk/repositories

# 创建www用户
RUN addgroup -g 1000 -S www && adduser -s /sbin/nologin -S -D -u 1000 -G www www

# 指定扩展版本
ENV PHPREDIS_VERSION 5.3.7

# PHPIZE_DEPS包含gcc g++等编译辅助类库，完成后删除;pecl安装扩展。
RUN apk add --no-cache $PHPIZE_DEPS \
    && apk add --no-cache libstdc++ libzip-dev vim\
    && apk add rabbitmq-c-dev \
    && apk update \
    && pecl install redis-$PHPREDIS_VERSION \
    && pecl install zip \
    && pecl install swoole \
    && pecl install mongodb \
    && pecl install amqp \
    && docker-php-ext-enable redis zip swoole mongodb amqp \
    && apk del $PHPIZE_DEPS

# docker-php-ext-install安装扩展。
RUN apk add --no-cache \
       freetype \
       libpng \
       libjpeg-turbo \
       freetype-dev \
       libpng-dev \
       jpeg-dev \
       libjpeg \
       libjpeg-turbo-dev \
       libwebp \
       libwebp-dev \
    && NUMPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) \
    && docker-php-ext-install -j${NUMPROC} gd \
    && docker-php-ext-install -j${NUMPROC} pdo_mysql \
    && docker-php-ext-install -j${NUMPROC} opcache \
    && docker-php-ext-install -j${NUMPROC} bcmath \
    && docker-php-ext-install -j${NUMPROC} mysqli

# 配置文件
COPY ./conf.d/ $PHP_INI_DIR/conf.d/
COPY  www.conf /usr/local/etc/php-fpm.d/www.conf

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
