---
layout: default
chapitre : true
package: gestion_rh
order:  625
---

### Création de la base de données 


````bash

php artisan make:model Personne -m
php artisan make:model Formateur -m
php artisan make:model Apprenant -m
php artisan make:model Groupe -m

php artisan make:migration add_nom_and_description_to_groupes_table --table=groupes

php artisan migrate 

````