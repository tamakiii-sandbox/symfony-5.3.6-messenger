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

## Usages
```sh
# Symfony Messenger
php bin/console debug:messenger

# Symfony
docker-compose exec php bin/console make:command
```

`awslocal` command
```sh
# SQS localStack
docker-compose exec localstack awslocal sqs list-queues
docker-compose exec localstack awslocal sqs send-message --queue-url http://localhost:4566/000000000000/symfony-messenger --message-body 'Welcome to SQS'
docker-compose exec localstack awslocal sqs receive-message --queue-url http://localhost:4566/000000000000/symfony-messenger
```

`aws` command
```sh
# `~/.aws/config`
# [localstack]
# region = ap-northeast-1

aws --profile localstack --region ap-northeast-1 --endpoint-url=http://localhost:4566 sqs list-queues
...
```
