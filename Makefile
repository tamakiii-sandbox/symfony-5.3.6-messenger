.PHONY: help install clean

help:
	@cat $(firstword $(MAKEFILE_LSIT))

install: \
	vendor

vendor:
	composer install

clean:
	vendor
