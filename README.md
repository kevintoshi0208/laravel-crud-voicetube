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
 GET HEAD  | api/todoLists                       |Get List of TodoList         |  Search Conditions: title,content,done_at[gte],done_at[lte]. Example: /api/todoLists?title=This&paginate=10&page=2&doneAt[gte]=2021-06-01&doneAt[lte]=2021-06-30 |
 POST      | api/todoLists                       |Create TodoList              |  link the relationship of attachment with parameter "attachment" in json                                                          |
 GET HEAD  | api/todoLists/{todoList}            |Get TodoList                 |                                                            |
 PUT PATCH | api/todoLists/{todoList}            |Update TodoList              |  link the relationship of attachment with parameter "attachment" in json                                                        |
 DELETE    | api/todoLists/{todoList}            |Delete TodoList              |                                                            |
 GET HEAD  | api/user                            |Get Current User             |                                                            |
           |                                     |                             |                                                            |
 POST      | api/todoListAttachment              |Create TodoList Attachment   |  It's a normal upload api not a json api , you can upload file with request field "file"  |                                                            |
 GET HEAD  | api/todoListAttachment/{id}         |Get TodoList Attachment      |                                                            |
 DELETE    | api/todoListAttachment/{id}         |Delete TodoList Attachment   |                                                            |
 GET HEAD  | api/todoListAttachment/{id}/download|Download TodoList Attachment |                                                            |

---
## Example: Create Todo List Json 

Headers:

Authorization: Bearer {JWT Token}
Content-Type: application/json
Accept: application/json

request Body:
```
{
	"title" : "This is title",
	"content" : "This is content",
	"done_at" : "2021-06-30",
	"attachment": 4
}
```

response Body:
```
{
    "title": "This is title",
    "content": "This is content",
    "done_at": "2021-06-30T00:00:00.000000Z",
    "updated_at": "2021-06-26T16:20:24.000000Z",
    "created_at": "2021-06-26T16:20:23.000000Z",
    "id": "16",
    "attachment": {
        "id": 4,
        "created_at": "2021-06-26T16:16:16.000000Z",
        "updated_at": "2021-06-26T16:16:16.000000Z",
        "file_name": "截圖-2021-01-20-下午6.webp",
        "mimetype": "image/webp",
        "link": "/api/todoListAttachment/4/download"
    }
}
```
