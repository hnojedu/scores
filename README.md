# Import and search scores

## How to set up local (docker way)

Requirements:

* Docker, docker-compose on local
* terminal

0. Clone projects and prepare vendor

```bash
git clone git@github.com:hnojedu/scores.git
cd scores
mkdir -p ./vendor/laravel
```

1. Download Laravel Sail

```bash
git clone https://github.com/laravel/sail.git ./vendor/laravel/sail
```

2. Setting env

```bash
cp .env.example .env
```

Changed if needed:

* APP_PORT: port to run page
* FORWARD_DB_PORT: port to access mysql via host machine
* DB_PASSWORD: root password
* APP_URL: ensure it's sync with APP_PORT, or FE can not call API

2. Start docker-compose

```bash
./vendor/laravel/sail/bin/sail up -d
```

3. Install app

```bash
./vendor/laravel/sail/bin/sail composer install

./vendor/laravel/sail/bin/sail php artisan key:generate
```


4. create database and migrage

```bash
docker exec scores-mysql-1 mysql -uroot -proot -e "CREATE DATABASE scores CHARACTER SET utf8mb4"

./vendor/laravel/sail/bin/sail php artisan migrate
```

5. Recreate app. Done

```bash
./vendor/laravel/sail/bin/sail up -d
```

App run at (by default): http://localhost:8082


## Deployments

ask @zy666
