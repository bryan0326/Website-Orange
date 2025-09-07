# 使用官方 PHP 7.4 映像檔作為基礎
FROM php:7.4-apache

# 設定工作目錄
WORKDIR /var/www/html

# 複製專案檔案到容器裡
COPY . .

# 啟用 Apache 的重寫模組
RUN a2enmod rewrite

# 指定容器啟動時執行的命令
CMD ["apache2-foreground"]
