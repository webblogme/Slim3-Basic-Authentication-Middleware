main: start
down: stop

start:
	docker-compose up -d
	
build:
	docker-compose build

stop:
	docker-compose down