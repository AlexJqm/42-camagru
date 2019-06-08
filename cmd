docker-machine create server
echo "cat << EOF | docker-machine ssh server sudo tee /var/lib/boot2docker/bootsync.sh > /dev/null
ifconfig eth1 192.168.99.100 netmask 255.255.255.0 broadcast 192.168.99.255 up
ip route add default via 192.168.99.1
EOF"
docker-machine restart server
docker-machine regenerate-certs server -f
echo 'eval "$(docker-machine env server)"'
docker-machine ip server
docker-compose up -d
