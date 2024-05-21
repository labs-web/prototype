---
layout: default
chapitre : true
package: pkg_competences
order:  626
---

- Ajouter description et nom dans CategorieTechnologie table

````bash
php artisan make:migration add_nom_description_to_categorie_technologies_table --table=categorie_technologies

php artisan migrate
````

- Ajouter UNite pour CategorieTechnologie

````bash
php artisan make:test pkg_competences/CategorieTechnologieTest
php artisan test
````
