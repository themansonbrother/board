# board
Доска объявлений.

Инструкция по развертыванию проекта.

1) склонировать проект
2) `cp .env.example .env`
3) поднять контейнеры - 
    `make build`
4) перейти в контейнер `php docker-compose exec php-fpm bash`
   - установить зависимости `composer install`
   - накатить миграции `php artisan migrate`
   - наполнить таблицы `php artisan db:seed --class=CitiesAndCountriesSeeder`
7) создать администратора:
    - `php docker-compose exec php-fpm bash`
    - `php artisan command:admin`
