# board
Доска объявлений.

Инструкция по развертыванию проекта.

1) склонировать проект
2) cp .env.example .env
3) поднять контейнеры - 
    ***docker-compose up -d --build***
4) перейти в контейнер php ***docker-compose exec php-fp bash***
5) накатить миграции ***php artisan migrate***
