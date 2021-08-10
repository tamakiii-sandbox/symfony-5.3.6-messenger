.PHONY: help setup clean

PORT_HTTP := 8000
PORT_LOCALSTACK := 4566

help:
	@cat $(firstword $(MAKEFILE_LSIT))

setup: \
	.docker.env

.docker.env:
	echo "PORT_HTTP=$(PORT_HTTP)" > $@
	echo "PORT_LOCALSTACK=$(PORT_LOCALSTACK)" >> $@

clean:
	rm -rf .docker.env
