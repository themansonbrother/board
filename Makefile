##help			Shows this help
help:
	@cat Makefile | grep "##." | sed '2d;s/##//;s/://'

##up			Starts containers
up:
	docker-compose up -d

##down			Stops containers
down:
	docker-compose down

##build			Build containers
build:
	docker-compose up -d --build

##stop			Stop containers
stop:
	docker-compose stop

##start			Start containers
start:
	docker-compose start

##restart			Restart containers
restart:
	docker-compose restart
