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

## API List And Description

 Method    | URI                                 | Description                 | Memo                                                       |
-----------|:------------------------------------|:----------------------------|:-----------------------------------------------------------|
 POST      | api/auth/login                      |JWT Login                    |                                                            |
 POST      | api/auth/logout                     |JWT Logout                   |                                                            |
 POST      | api/auth/me                         |JWT Get The Auth             |                                                            |
 POST      | api/auth/refresh                    |JWT refresh                  |                                                            |
           |                                     |                             |                                                            |
 GET|HEAD  | api/todoLists                       |Get List of TodoList         |  Serch Condtions: title,content,done_at[gte],done_at[lte]. |
 POST      | api/todoLists                       |Create TodoList              |                                                            |
 GET|HEAD  | api/todoLists/{todoList}            |Get TodoList                 |                                                            |
 PUT|PATCH | api/todoLists/{todoList}            |Update TodoList              |                                                            |
 DELETE    | api/todoLists/{todoList}            |Delete TodoList              |                                                            |
 GET|HEAD  | api/user                            |Get Current User             |                                                            |
           |                                     |                             |                                                            |
 POST      | api/todoListAttachment              |Create TodoList Attachment   |                                                            |                                                            |
 GET|HEAD  | api/todoListAttachment/{id}         |Get TodoList Attachment      |                                                            |
 DELETE    | api/todoListAttachment/{id}         |Delete TodoList Attachment   |                                                            |
 GET|HEAD  | api/todoListAttachment/{id}/download|Download TodoList Attachment |                                                            |
