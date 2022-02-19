# JUMIA_TEST - PHP
I chose to use Laradock to run the following services: nginx rabbitmq mariadb and phpmyadmin.

## Config
Edit /etc/hosts from your local machine to redirect jumia.test to 127.0.0.1
```127.0.0.1 jumia.test```

Go to laradock and run:
```cd laradock 
docker-compose up -d nginx rabbitmq mariadb phpmyadmin```

Ps. If you have any problem installing MariaDB, set "buildkit": false in your Docker Engine, please.


## View notifications w/ RabbitMQ
```http://localhost:15672
login: guest
pass: guest

Then go to Queues -> Get Message(s)
```

## View database
```http://localhost:8081
server: mariadb
login: default
pass: secret
```


## Execute migration
```
cd laradock
docker-compose exec workspace bash

cd jumia_test/
php artisan migrate
```

### Usage
Please, use this Header: 
```Accept: application/json```


| URL                               | METHOD | JSON                                                        |
|-----------------------------------|--------|-------------------------------------------------------------|
| http://jumia.test/api/jobs/list   | GET    |                                                             |
| http://jumia.test/api/jobs/create | POST   | {"title":"job title test","description":"test description"} |
