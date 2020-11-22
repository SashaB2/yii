up:
	docker-compose up -d

down:
	docker-compose down

network:
	docker network create appnet

restart:
	docker-compose restart