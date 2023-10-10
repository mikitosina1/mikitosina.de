# DOCKER TASKS
up:
	docker-compose up -d

down:
	docker-compose down

bash: #command string inside main container
	docker exec -it appcont bash


composer-install: # Запустить composer install внутри контейнера
	docker exec -it appcont bash -c "composer install --no-cache"

# Запустить npm install внутри контейнера
npm-install:
	docker exec -it appcont bash -c "npm install"

# Запустить npm run watch внутри контейнера
npm-watch:
	docker exec -it appcont bash -c "npm run watch"

install:
	up && composer-install && npm-install && npm-watch
