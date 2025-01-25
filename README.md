
# ENV Setup
DB_PORT=3306

DB_DATABASE=laravel_db

DB_USERNAME=shaikat

DB_PASSWORD='shaikat'


DOCKER_APP_PORT=3445

DOCKER_APP_SSL_PORT=3446

DOCKER_DB_PORT=3447

DOCKER_PHPMYADMIN_PORT=2448

DOCKER_REDIS_PORT=3449


# Docker Command
go to project directory example: cd/your directory/this project

Inside Project Directory open command line

docker compose build

docker compose up -d

docker exec -it --user root laravel_backend /bin/bash

# Inside Bash Project setup

composer install

php artisan key:generate

php artisan migrate:fresh --seed

# Test
php artisan test



# Project Base URL
http://localhost:3445



# Project Admin credentials

email: kumarshaikatbala@gmail.com


password: password



# Project User credentials


email: user@gmail.com

password: password

# API Documentation

http://localhost:3445/docs/api

https://documenter.getpostman.com/view/31891735/2sAYQakBG1



