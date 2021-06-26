# Voicetube Exam

## Installation

```
$ cd docker-compose

$ docker-compose up -d

$ docker exec -it php74-container /bin/bash

root# cp .env.example .env

root# compsoer install

root# php artisan migrate

root# php artisan db:seed

root# php artisan key:generate

root# php artisan jwt:secret

```

## Default Account

email: kevintoshi0208@gmail.com  
password: password

## How to Get The Token 

method: POST
url: http://localhost/api/auth/login

request body:
```
{
    "email": "kevintoshi0208@gmail.com",
    "password": "password"
}
```

## How to Run Test

```

$ docker exec -it php74-container /bin/bash
root# php artisan test

```
