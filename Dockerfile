# образ всё тот же самый
FROM php:8-fpm
# 1. development packages
# далее идёт слой, сначала обновляем гит, потом устанавливаем, -y - со всем соглашаемся
# необходим git, так как composer устанавливает всё с помощью git'а (клонирует)
RUN apt-get update && apt-get install -y git

# Install Composer
# устанавливаем composer вместе с php
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# включаем mysql
RUN docker-php-ext-install mysqli