# Pizzeria

## How to run
 - Clone the repository
 - Inside the devops folder run `docker compose up -d`
 - Exec into the container by running `docker compose exec backend sh`
 - Run the command `composer install`
 - Run the command `php artisan doctrine:proxies:generate`
 - Run the command `php artisan doctrine:schema:create`
 - Application should be running on `http://localhost`

## Routes

| Route         | Url                              |
|---------------|----------------------------------|
| Customer page | /                                |
| Store page    | /store/(dominos\|new_york_pizza) |
