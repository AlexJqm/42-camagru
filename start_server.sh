echo "Lancement de la creation du docker sous l'IP: 192.168.99.100"
sleep 5

docker-machine create server
cat << EOF | docker-machine ssh server sudo tee /var/lib/boot2docker/bootsync.sh > /dev/null
ifconfig eth1 192.168.99.100 netmask 255.255.255.0 broadcast 192.168.99.255 up
ip route add default via 192.168.99.1
EOF
docker-machine restart server
docker-machine regenerate-certs server -f
eval "$(docker-machine env server)"
docker-machine ip server
docker-compose up -d
docker exec -ti -u root 42-camagru_www_1 sh -c /var/www/config/add_user_php.sh
docker exec -ti -u root 42-camagru_www_1 sh -c /var/www/config/install_smtp.sh
echo "Connectez vous au server avec la commande:"
echo "docker exec -it 42-camagru_www_1 /bin/bash"
