

###  install

```shell
composer require shab/marketplace:dev-main 
```
### migration
```shell
 php artisan migrate
 php artisan migrate --path=vendor/shab/marketplace/src/Database/Migrations
```
### test
``
php artisan test --filter ProductTest
``
### add require in composer
````
"autoload-dev": {
"psr-4": {
"marketplace\\src\\": "vendor/shab/marketplace/src/"
}
