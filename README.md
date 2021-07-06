
### project structure
  - uses service layer structure and implement repository pattern  
  
### Installation
### via docker
Run Project .

```sh
$ git clone https://github.com/bhalawaty/Invoicing_web_app.git
$ cd invoicing_web_app
$ cp  .env.example .env
$ docker-compose build webserver
$ docker-compose up -d 
$ docker-compose exec webserver php artisan migrate
```

project Link -> http://localhost:8080


### API Docs

Project Api with examples  

```sh
https://documenter.getpostman.com/view/5532373/Tzm3pJCX
```
