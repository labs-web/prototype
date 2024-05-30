---
layout: default
chapitre : true
package: pkg_competences
order:  624
---

### Création de la base de données 

````bash

php artisan make:model pkgNiveauCompetence -m
php artisan make:seeder pkgNiveauCompetencesSeeder -m
php artisan make:factory pkg_competences/NiveauCompetencesFactory -m

````
### add description nom to competences table

````bash

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