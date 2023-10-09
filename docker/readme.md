## запустить контейнер
docker-compose up -d

## остановить контейнер
docker-compose down

## список контейнеров
docker ps -a

## открыть баш контейнера (например: docker exec -it nginxcont bash)
docker exec -it <containerName> sh (bash)

## перегрузить контейнер
docker-compose restart <containerName>
