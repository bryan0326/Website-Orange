# 使用官方 PHP 映像檔作為基礎
# 建議使用您專案實際需要的 PHP 版本
# 例如：如果專案是用 PHP 7.4 開發的，可以改成 php:7.4-apache
FROM php:8.2-apache

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

# 如果需要其他擴充功能，例如 gd (圖片處理), intl (國際化), opcache (效能優化) 等，可以這樣安裝：
# RUN docker-php-ext-install gd
# RUN docker-php-ext-install intl
# RUN docker-php-ext-install opcache

# --- Apache 配置 ---
# 啟用 Apache 的重寫模組 (如果你的專案需要 .htaccess)
RUN a2enmod rewrite

COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Apache 預設監聽 80
EXPOSE 80

# Apache啟動伺服器
CMD ["apache2-foreground"]