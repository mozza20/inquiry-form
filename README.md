お問い合わせフォーム
環境構築
Dockerビルド
1.git clone リンク
2.docker-compose up -d --build

※ MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。

Laravel環境構築
1.docker-compose exec php bash
2.composer install
3..env.exampleファイルから.envを作成し、環境変数を変更
4.php artisan key:generate
5.php artisan migrate
6.php artisan db:seed

使用技術
・PHP 8.0
・Laravel 10.0
・MySQL 8.0

ER図
![image](https://github.com/user-attachments/assets/a5f52dcf-e5da-47ae-a9f3-89ee742d5040)

URL
・開発環境： http://localhost/
・phpMyAdmin： http://localhost:8080/
![image](https://github.com/user-attachments/assets/f5f9598f-1dc9-4dd0-8599-51e81c7c5b34)
![image](https://github.com/user-attachments/assets/9c0c0f9f-dbe6-4c80-8690-8f47e79e9efa)
