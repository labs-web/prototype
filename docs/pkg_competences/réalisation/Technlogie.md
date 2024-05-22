---
layout: default
chapitre : true
package: pkg_competences
order:  626
---

- Ajouter description et nom dans CategorieTechnologie table

````bash
php artisan make:migration add_nom_description_to_technologies_table --table=technologies

php artisan migrate
````
