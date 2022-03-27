FROM php:8.0.3-apache

# Applicationの設定
RUN mkdir /var/www/project.com
# COPYコマンドはコピーファイルがカレントディレクトリ＝本DockerFileと同じディレクトリ階層にないと失敗する
COPY php.ini /usr/local/etc/php

# webサーバーの設定
# 設定ファイルのバックアップ（rオプションは、ディレクトリの中身もコピーする）
# RUNコマンドはイメージ作成時に実行される
RUN cp -r /etc/apache2 /etc/apache2_bk
# VirtualHostの固有設定追加
COPY vhost.conf /etc/apache2/sites-available/

