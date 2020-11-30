## 1. Clone project
Open cmd, go into xampp\htdocs folder. Run command:

git clone https://github.com/manh9760/myshop.git

## 2. Generate depedencies in vendor folder
Go to myshop project

run composer install to generate depedencies in vendor folder

## 3. Change .env.example file to .env

## 4. Run command: php artisan key:generate

## 5. Configure .env and config\app.php file

## 6. Create database:

    - Create new database named "myshop" (choose: utf8mb4_unicode_ci)
    
    - In cmd run: php artisan migrate
