# Import and search scores

## How to development (docker way)

Requirements:

* Docker, docker-compose on local
* terminal

0. Clone projects and prepare vendor

```bash
git clone https://github.com/anhcx0209/scores.git
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

2. Start docker-compose

```bash
./vendor/laravel/sail/bin/sail up -d
```

3. Install app

```bash
./vendor/laravel/sail/bin/sail composer install

./vendor/laravel/sail/bin/sail php artisan key:generate
```


4. Install app

```bash
./vendor/laravel/sail/bin/sail composer install

./vendor/laravel/sail/bin/sail php artisan key:generate
```


5. create database and migrage

```bash
docker exec scores-mysql-1 mysql -uroot -proot -e "CREATE DATABASE scores CHARACTER SET utf8mb4"

./vendor/laravel/sail/bin/sail php artisan migrate
```

6. Recreate app. Done

```bash
./vendor/laravel/sail/bin/sail up -d
```


## Deployments

ask @zy666