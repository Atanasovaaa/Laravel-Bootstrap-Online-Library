# Requirements

1. PHP version 7.4
2. Composer -> https://getcomposer.org/download/
3. Node(v12) & npm(v6.13)

# Run Application

1. run "composer install"
2. run "cp .env.example .env"
3. run "php artisan key:generate"
4. npm install
5. npm run dev
6. Create database with name "library"
7. run "php artisan migrate --seed"

### For Login

1. Влезте в създадената база данни и в таблица users използвайте един от въведените имейли
2. Паролата за всички юзъри е "password"
