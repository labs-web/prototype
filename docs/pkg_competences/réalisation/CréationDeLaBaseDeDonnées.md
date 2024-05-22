---
layout: default
chapitre : true
package: pkg_competences
order:  625
---

### Création de la base de données 


````bash

php artisan make:model NiveauCompetence -m
php artisan make:model Competence -m
php artisan make:model CategorieTechnologie -m
php artisan make:model Technologie -m


````

### add description nom to competences table


````bash

php artisan make:migration add_description_nom_to_competences_table --table=competences
 php artisan make:migration add_nom_and_description_to_niveau_competences_table --table=niveau_competences

````
### Migrate


````bash

php artisan migrate:fresh

````
### Exécuter le seeder

````bash

php artisan migrate:fresh --seed 

````
