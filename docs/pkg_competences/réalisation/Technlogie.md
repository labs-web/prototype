---
layout: default
chapitre : true
package: pkg_competences
order:  626
---

- Ajouter description et nom dans Technologie table

````bash
php artisan make:migration add_nom_description_to_technologies_table --table=technologies

php artisan make:model Technologie

php artisan migrate
````
