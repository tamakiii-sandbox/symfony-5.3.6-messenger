#!/bin/sh -ex

awslocal sqs create-queue --queue-name symfony-messenger
# aws --endpoint-url=http://localhost:4566 sqs create-queue --queue-name onexlab
