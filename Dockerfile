# 使用官方 PHP 映像檔作為基礎
FROM php:7.4-apache

# 設定時區，這對日誌記錄和時間相關的功能很重要
ENV TZ=Asia/Taipei
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# 設定工作目錄
WORKDIR /var/www/html

# 安裝 Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 複製 Composer 相關檔案
COPY composer.json composer.lock ./

# 安裝 Composer 依賴
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# --- 複製專案檔案 ---
# 複製 PHP 專案到容器的工作目錄

COPY . .

# --- 安裝 PHP 擴充功能 ---
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli pdo pdo_mysql
