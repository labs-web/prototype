---
layout: default
chapitre : true
package: pkg_realisation_projet
order:  650
---

### Étape 1: Création seeders


````bash

php artisan make:seeder FormationDataSeeder

````

### Étape 2: Installer la Bibliothèque CSV

````bash

composer require league/csv
php artisan db:seed 

````