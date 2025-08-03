# アプリケーション名
お問い合わせフォーム

Dockerビルド
1. git clone git@github.com:Lemon253/Check-test.git
2.docker-compose up -d -build

##Laravel環境構築
1.docker-compose exec php bash
2.composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

## 使用技術(実行環境)
・PHP 8.0
・MySQL 8.0
・Laravel 10.0

## ER図
< - - - 作成したER図の画像 - - - >

## URL
・開発環境：http://localhost/
・phpMyAdmin：http://localhost:8080/