# symfony-5.3.6

## How to use
```sh
make -f docker.mk setup # PORT_HTTP=8000 PORT_LOCALSTACK=4566
docker-compose build
docker-compose run --rm php make install
docker-compose --env-file=.docker.env up

open "http://localhost:8000/health"
curl http://localhost:4566/health
```
