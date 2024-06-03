---
layout: default
chapitre: true
package : pkg_autorisations
order: 616
---



## add fields to messages table
````bash

php artisan make:migration add_description_nom_to_action_table --table=action
````

## Migrate

````bash
php artisan migrate:fresh

````

## Exécuter le seeder

````bash
php artisan migrate:fresh --seed 
````

## Test

````bash
php artisan test --filter=ActionTest 
````
