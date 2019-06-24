#!/usr/bin/env bash

echo "Ajout de l'utilisateur www-data"
sleep 5

deluser www-data
useradd -m -p qq www-data
chmod -R 777 /var/www/
chown -R 777 /var/www/
