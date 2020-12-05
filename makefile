up:
	docker-compose up -d

down:
	docker-compose down

rm:
	docker-compose down --rmi all

network:
	docker network create appnet

restart:
	docker-compose restart

composer:
	docker-compose exec -d php bash -c "composer install"

migrate:
	docker-compose exec -d php bash -c "yes | ./yii migrate"
