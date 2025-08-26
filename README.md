# アプリケーション名

お問い合わせフォーム

Docker ビルド

1. git clone git@github.com:Lemon253/Check-test.git
   2.docker-compose up -d -build

##Laravel 環境構築
1.docker-compose exec php bash
2.composer install 3. .env.example ファイルから.env を作成し、環境変数を下記のように変更
DB_CONNECTION=mysql
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

4. php artisan key:generate
   5.php artisan migrate
   6.php artisan db:seed

## 使用技術(実行環境)

・PHP 8.1.33
・MySQL 8.0.26
・Laravel 8.83.29

## ER 図

< - - - 作成した ER 図の画像 - - - >
ER 図.drawio.png

## URL

・開発環境：http://localhost/
・phpMyAdmin：http://localhost:8080/
