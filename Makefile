up:
	docker-compose up -d
down:
	docker-compose down
down-hard:
	docker-compose down --rmi all --volumes --remove-orphans
app:
	docker-compose exec app bash
db:
	docker-compose exec db bash
migrate:
	docker-compose exec app php artisan migrate
resetdb:
	docker-compose exec app php artisan migrate:fresh --seed
