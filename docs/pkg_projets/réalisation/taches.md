---
layout: default
chapitre : true
package: pkg_projets
order:  647
---

- Ajouter de nouvelles colonnes dans le tableau des tâches

````bash
php artisan make:migration add_new_colomuns_to_taches_table --table=taches

php artisan migrate
````

- Ajouter Unite pour Taches

````bash
php artisan make:test pkg_projets/Tache
php artisan test
````
