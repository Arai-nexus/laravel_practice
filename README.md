# 環境構築

```
docker-compose build --no-cache
docker-compose exec app chmod -R 777 storage bootstrap/cache
docker-compose exec app cp .env.example .env
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan storage:link
docker-compose exec app php artisan migrate:fresh --seed
