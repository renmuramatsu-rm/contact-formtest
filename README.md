お問い合わせフォーム

【環境構築】
①Dockerの構築
$ docker-compose up -d --build
②Laravelのパッケージのインストール
　composer install
③マイグレーション（テーブル作成）
  php artisan make:migration create_categories_table
  php artisan make:migration create_contacts_table
　php artisan migrate
④シーディング
  php artisan make:seeder CategoriesTableSeeder
  php artisan make:seeder ContactsTableSeeder
  php artisan make:seeder DatabasesTableSeeder(Factory用)
　php artisan db:seed

 【使用技術】
 　php:8.4.2
   laravel:8.83.8
   MySQL:8.0.41

　【ER図】
![image](https://github.com/user-attachments/assets/d394a34d-0a72-4fc7-8750-00dfafdcd321)


  【URL】
  　環境開発：http://localhost/
    phpMyadmin:http://localhost:8080/
   
