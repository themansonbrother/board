# board
Доска объявлений.

Инструкция по развертыванию проекта.

1) склонировать проект
2) cp .env.example .env
3) поднять контейнеры - 
    ***make build***
4) перейти в контейнер php ***docker-compose exec php-fpm bash***
5) накатить миграции ***php artisan migrate***
