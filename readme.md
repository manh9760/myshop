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
    
    - Import database file name "myshop.sql" in myshop project to myshop database
    
 ## 7. Enjoy:
 
    - Go to Guest page: http://localhost:8080/myshop/ (replace 8080 port with your Apachge port)
    
    - And Admin page: http://localhost:8080/myshop/admin (use account: parabol123654@gmail.com and pass: manh1290)
