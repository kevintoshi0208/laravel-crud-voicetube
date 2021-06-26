# Voicetube Exam

## Installation

```
$ cd docker-compose

$ docker-compose up -d

$ docker exec -it php74-container /bin/bash

root# php artisan migrate

root# php artisan db:seed 

```

## Default Account

email: kevintoshi0208@gmail.com  
password: password

## How to Get The Token 

url: http://localhost/api/auth/login

request body:
```
{
    "email": "kevintoshi0208@gmail.com",
    "password": "password"
}
```
