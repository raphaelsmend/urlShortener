<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Links Shortner

## Technical test for developing an api to shorten links. this project was developed using containers. in the laravel language, using mysql as a database.

<!--ts-->
* [Prerequisites](#prerequisites)
* [Cloning repository](#clonning)
* [Installing](#installing)
* [Running](#running)
* [Links and Endpoints](#endpoits)
<!--te-->

Prerequisites
============

```bash
get latest version of docker and docker-compose
```

Cloning repository
============

```bash
$ git clone https://github.com/raphaelsmend/urlShortener.git
```
Installing
============

```bash
$ cd urlShortener
$ make install
```
Running
============
for start all containers
```bash
$ make up

* this command runs the laravel server, do not close the window.
```

for tests
```bash
$ make tests
```

for restart all containers
```bash
$ make restart
```

for stop all containers
```bash
$ make down
```

Links and Endpoints
============

Create new URL
```bash
ENDPOINT: http://localhost:8000/api/Url
METHOD: POST
FIELDS:
  {
    "url_original" : "http://www1.com.br",
	"date_expiration" : "2022-12-31", //OPTIONAL
	"url_shortened" : "http://localhost:/8o765gg" //OPTIONAL
  }
```

FrontEnd for LIST URL
```bash
http://localhost

USER: admin@admin
PASSWORD: admin
```