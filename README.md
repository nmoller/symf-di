# Console command dependant du di

Pour tester:
```
docker run -d --rm --name db01 \
-e MYSQL_ROOT_PASSWORD=root \
-e MYSQL_DATABASE=moodle \
mysql:5.7

docker exec -it db01 bash

```
utiliser table de 

https://www.phpknowhow.com/extra/mysql-example-tables/

```
docker run --rm --interactive --tty -v ${PWD}:/app \
 -u $(id -u):$(id -g) --link db01 \
 --entrypoint /usr/local/bin/php  \
 -e COMPOSER_HOME=/app/composer \
 -w /app  prooph/composer:7.1 bin/app.php uqam:inscriptions
```