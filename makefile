start: docker-up install
up: docker-up
stop: docker-down
bash: docker-bash

UID := $(shell id -u)
GID := $(shell id -g)

docker-up:
	UID=${UID} GID=${GID} docker-compose up -d --build

install:
	docker exec -u appjobsuser:appjobsgroup appjobs-php composer install
	docker exec -u appjobsuser:appjobsgroup appjobs-php php artisan migrate:fresh --seed --force

migrate:
	docker exec -u appjobsuser:appjobsgroup appjobs-php php artisan migrate:fresh --seed --force

docker-down:
	docker-compose down

docker-bash:
	docker exec -u appjobsuser:appjobsgroup -it appjobs-php bash

solve:
	docker exec -u appjobsuser:appjobsgroup appjobs-php php artisan clean:artifacts
