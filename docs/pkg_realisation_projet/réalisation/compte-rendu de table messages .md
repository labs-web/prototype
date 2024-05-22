---
layout: default
chapitre : true
package: pkg_realisation_projet
order:  650
---

### add fields to messages table 


````bash

php artisan make:migration add_description_nom_to_competences_table --table=competences

````

### Migrate


````bash

php artisan migrate:fresh

````
### Exécuter le seeder

````bash

php artisan migrate:fresh --seed 

```` 

### Test

````bash

php artisan test --filter=MessageTest 

```` 

