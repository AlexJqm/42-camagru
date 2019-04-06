# 42-camagru

Create virtual machine: ```docker-machine create $name```

Or start virtual machine: ```docker-machine start $name```

Set environment variables : ```eval "$(docker-machine env $name)"```

Start server: ```docker-compose up -d```

Get ip virtual machine: ```docker-machine ip $name```

Run mysql client: ```docker-compose exec db mysql -u root -p```
