#!/bin/bash
docker-machine create server
docker-machine start server
eval "$(docker-machine env server)"
docker-compose up -d
docker-machine ip server
