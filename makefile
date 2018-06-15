main: start
down: stop

start:
	docker-compose up -d
	#gulp

stop:
	docker-compose down